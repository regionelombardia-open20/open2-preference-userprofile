<?php
namespace preference\userprofile\models;

use open20\amos\admin\AmosAdmin;
use Yii;
use yii\base\Model;

/**
 * Model without table
 * 
 */
class TicketFaqForm extends Model
{

    public $name;
    public $surname;
    public $email;
//    public $confermaEmail;
    public $telefono;
    public $title;
    public $request;
    public $privacy;
    public $reCaptcha;

    public function rules()
    {
        return [
            [['email', 'request' , 'privacy'], 'required'],
            [['email' /* , 'confermaEmail' */], 'email'],
            [['title', 'name', 'surname', 'email'], 'string', 'max' => 255],
            [['request'], 'string', 'max' => 1000],
//            ['confermaEmail', 'compare', 'compareAttribute' => 'email', 'message' => Yii::t('preferenceuser', 'Le email inserite non coincidono')],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'message' => AmosAdmin::t('amosadmin', "#register_recaptcha_alert")]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => Yii::t('preferenceuser', 'Nome'),
            'surname' => Yii::t('preferenceuser', 'Cognome'),
            'email' => Yii::t('preferenceuser', 'Email'),
            'privacy' => Yii::t('preferenceuser', 'Ho preso visione dell\'informativa privacy'),
            'confermaEmail' => Yii::t('preferenceuser', 'Conferma Email'),
            'title' => Yii::t('preferenceuser', 'Titolo'),
            'request' => Yii::t('preferenceuser', 'Domanda'),
            'reCaptcha' => Yii::t('preferenceuser', 'Validazione re-captcha'),
        ];
    }

}