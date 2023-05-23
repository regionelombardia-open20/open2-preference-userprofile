<?php

use open20\amos\core\helpers\Html;
use open20\design\components\bootstrapitalia\ActiveForm;
use open20\design\assets\BootstrapItaliaDesignAsset;

/**
 * @var \preference\userprofile\models\TicketFaqForm $model
 * @var string $urlToReturn
 * @var string $errorMessage
 * @var boolean $ok
 */

$bootstrapItaliaAsset = BootstrapItaliaDesignAsset::register($this);
?>
<div class="uk-section- uk-visible@xl header-banner">
    <div style="background-image: url('/attachments/file/view?hash=a2b0b440e50048acf40f54006cb2d4f0&canCache=1');" class="uk-background-norepeat uk-background-cover uk-background-center-center uk-section">

        <div class="uk-container">
            <div class="uk-container">
                <div class="container">
                    <div class="uk-width-1-1@m">
                        <h1 class="pt-3">Richiesta informazioni</h1>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<div class="container pb-5">
    <div class="row variable-gutters">
        <div class="col-12">
            <div>

                <?php
                if (!is_null($ok)) :
                    if ($ok) :
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Gentile utente, la tua domanda è stata inviata. Ti risponderemo quanto prima
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php
                    else :
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Errore nell'invio della comunicazione...
                            <div>
                                <?= $errorMessage ?>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    endif;
                endif;
                ?>

                <?php
                // echo $ok;

                $form = ActiveForm::begin([
                    'enableClientScript' => true,
                    'options' => [
                        'id' => 'personal-data-form',
                        'class' => 'needs-validation form-rounded',
                        'enctype' => 'multipart/form-data',
                    ],
                ]);
                ?>
                <div class="row variable-gutters pt-5">
                    <div class="col-md-6">
                        <?= $form->field($model, 'name')->textInput(
                            [
                                'placeholder' => $model->getAttributeLabel('name')
                            ]
                        ) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'surname')->textInput(
                            [
                                'placeholder' => $model->getAttributeLabel('surname')
                            ]
                        ) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'email')->textInput(
                            [
                                'placeholder' => 'Inserisci il tuo indirizzo email'
                            ]
                        ) ?>
                    </div>

                    <div class="col-12 mb-4">
                        <p class="h5"><b>CATEGORIA:</b> <?= $categoryTitle ?></p>
                    </div>


                    <div class="col-12">
                        <?= $form->field($model, 'title')->textInput(
                            [
                                'placeholder' => $model->getAttributeLabel('title'),
                            ]
                        ) ?>
                    </div>

                    <div class="col-12">
                        <?= $form->field($model, 'request')->textarea(
                            [
                                'placeholder' => $model->getAttributeLabel('request'),
                                'rows' => 10
                            ]
                        ) ?>
                    </div>
                    <div class="col-12">
                        <?= $form->field($model, 'reCaptcha')->widget(\himiklab\yii2\recaptcha\ReCaptcha2::className(), [
                            'configComponentName' => 'myReCaptcha'
                        ])->label('') ?>
                    </div>
                    <div class="col-12">
                        <?php

                        echo $form->field($model, 'privacy')->checkBox(
                            [
                                'label' => 'Ho preso visione dell\'' . Html::a('informativa privacy', null, ['href' => \Yii::$app->params['linkConfigurations']['privacyPolicyLinkCommon'], 'title' => 'Leggi l\'informativa privacy', 'target' => '_blank'])
                            ]
                        )
                        ?>
                    </div>

                </div>
                <div>
                    <?php
                    echo Html::a(
                        'Torna alla Landing Page',
                        $urlToReturn,
                        ['class' => 'btn btn-secondary px-5']
                    );
                    ?>

                    <?php
                    echo Html::submitButton(
                        'Invia',
                        ['class' => 'btn btn-primary px-5', 'name' => 'submit-action', 'value' => 'forward']
                    );
                    ?>
                </div>


                <?php ActiveForm::end(); ?>

            </div>
        </div>


    </div>
</div>