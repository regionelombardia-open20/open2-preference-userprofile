<?php

namespace preference\userprofile\controllers;

use backend\modules\landings\models\PreferenceLanding;
use backend\modules\landings\utility\PreferenceLandingUtility;
use open20\amos\core\controllers\BackendController;
use open20\amos\core\utilities\Email;
use open2\amos\ticket\models\Ticket;
use open2\amos\ticket\models\TicketCategorie;
use preference\userprofile\models\FormContatti;
use preference\userprofile\models\TicketFaqForm;
use preference\userprofile\utility\EmailUtility;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\HtmlPurifier;
use yii\helpers\StringHelper;
use yii\helpers\VarDumper;
use yii\web\ForbiddenHttpException;

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    preference\userprofile\controllers
 * @category   CategoryName
 */

/**
 * Description of BaseController
 *
 */
class ContactsController extends BackendController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['settings'],
                'rules' => [
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['PC_REGISTERD_USER'],
                    ],
                    [
                        'actions' => [
                            'contacts',
                            'faq-ticket',
                            'quick-registration',
                        ],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],


                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'contacts' => ['post', 'get'],
                    'quick-registration' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function init()
    {
        // Layout Bootstrap Italia
        $this->setUpLayout('@vendor/open20/design/src/views/layouts/bi-main-layout');
        //$this->view->params['customClassMainContent'] = 'container';

        parent::init();
    }

    /**
     *
     * @return string
     */
    public function actionContacts()
    {
        $toEmail = isset(Yii::$app->params['assistance']['email'])? Yii::$app->params['assistance']['email']: null;
        $model = new FormContatti();

        if (is_null($toEmail)) {
            Yii::$app->session->addFlash('warning', 'Email di assistenza non impostata');
        }
//        VarDumper::dump($toEmail, $depth = 10, $highlight = true);

        $ok = null;
        if (Yii::$app->request->post() && !is_null($toEmail)) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {
                // invio email
//                $tipoMessaggio = isset($model->elencoTipiMessaggio[$model->tipoMessaggio]) ? $model->elencoTipiMessaggio[$model->tipoMessaggio] : '';

                $corpoMail = 'Nome: ' . $model->nome . ' <br>
                Cognome: ' . $model->cognome . ' <br>
                E-mail: ' . $model->email . ' <br>
                Messaggio:<hr>
                '. str_replace("\r", "<br />", HtmlPurifier::process($model->messaggio)) .'<hr>';

                $mailModule = Yii::$app->getModule("email");
                $mailModule->defaultLayout = "layout_without_header_and_footer";
                $ok  = Email::sendMail(
                    Yii::$app->params['supportEmail'],
                    $toEmail,
                    'Preference Centre Regione Lombardia - Segnalazione malfunzionamento',
                    $corpoMail
                );

                if ($ok) {
//                    Yii::$app->session->addFlash('success', 'Gentile utente, la tua segnalazione è stata inviata. Ti risponderemo quanto prima');
                    $model = new FormContatti();
                }

            }

            // VarDumper::dump( $model->errors, $depth = 10, $highlight = true);
        }
//        VarDumper::dump( $model->errors, $depth = 10, $highlight = true);

        return $this->render("contacts", [
            'model' => $model,
            'ok' => $ok
        ]);
    }

    /**
     *
     * @return string
     * @throws Yii\web\BadRequestHttpException
     * @throws ForbiddenHttpException
     */
    public function actionFaqTicket($category_id, $landing_id)
    {
        $landing = PreferenceLanding::findOne(['id' => $landing_id]);
        if (empty($landing)) {
            throw new yii\web\BadRequestHttpException('Landing not exist');
        }

        $faqCategory = TicketCategorie::findOne(['id' => $category_id]);
        if (empty($faqCategory)) {
            throw new yii\web\BadRequestHttpException('Category not exist');
        }

        if (!$faqCategory->abilita_ticket) {
            throw new ForbiddenHttpException('La categoria non è abilitata ai ticket');
        }

        PreferenceLandingUtility::getUrlLanding($landing);

        $ok = null;
        $model = new TicketFaqForm();
        $errorMessage = '';

        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
            if ($model->validate()) {

                // creazione del ticket

                $ticket = new Ticket();
                $ticket->ticket_categoria_id = $faqCategory->id;
                $ticket->titolo = $model->title;
                $ticket->descrizione = $model->request;
                $ticket->guest_name = $model->name;
                $ticket->guest_surname = $model->surname;
                $ticket->guest_email = $model->email;
                $ticket->created_at = date('Y-m-d H:i:s');

                if ($ticket->validate() && $ticket->save()) {
                    $ok = true;
                    $model = new TicketFaqForm();
                } else {
                    $ok = false;
                    foreach ($ticket->errors as $error) {
                        $errorMessage .= '<BR /> - ' . implode('<BR /> - ', $error);
                    }
                }

            } else {
                $ok = false;
            }

        }

        $urlToReturn = PreferenceLandingUtility::getUrlLanding($landing) . '?#faq-section-id';
        $categoryTitle = $faqCategory->titolo;

        return $this->render("faq-ticket", [
            'model' => $model,
            'urlToReturn' => $urlToReturn,
            'categoryTitle' => $categoryTitle,
            'ok' => $ok,
            'errorMessage' => $errorMessage,
        ]);
    }

    public function actionQuickRegistration($email = 'stefano.pavani+RAPIDA@open20.it')
    {
        // $email = 'michele.zucchini+RAPIDA@open20.it';

        EmailUtility::sendUserMailQuickRegistration($email, 'Lombardia Informa: registrazione rapida', $email, 'Password2020');
    }
}
