<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    [NAMESPACE_HERE]
 * @category   CategoryName
 */

use open20\design\components\bootstrapitalia\ActiveForm;
use open20\amos\core\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\View;

$idCittadini = 'target_cittadini-id';
$this->title = 'Scelta contatti';

// CITTADINI
$this->registerJs(
    <<<JS
    $("button[id^='scelta-target']").click(function(event) {        
        event.preventDefault();  
    });

    $("#target_cittadini-id").change(function(event) {
        $("#scelta-target-cittadini").trigger( "click" );
    });
       
    $("#collapse-cittadini").on('show.bs.collapse', function (e) {
        $("#target_cittadini-id").attr("disabled", "disabled");        
        var dataTarget = $(this).attr("data-target-str"); 
        if (!$("#contact-input-"+dataTarget+"-id").val()) {
            $("#contact-input-"+dataTarget+"-id").val('{$email}');
        } 
    });
    
    $("#collapse-cittadini").on('shown.bs.collapse', function (e) {
        $("#target_cittadini-id").removeAttr("disabled");
        $("#target_cittadini-id").prop('checked', true);
        var dataTarget = $(this).attr("data-target-str"); 
        $("#contact-input-"+dataTarget+"-id").focus();
    });
    
    $("#collapse-cittadini").on('hide.bs.collapse', function (e) {
        $("#target_cittadini-id").attr("disabled", "disabled");   
    });
    
    $("#collapse-cittadini").on('hidden.bs.collapse', function (e) {
        $("#target_cittadini-id").removeAttr("disabled");
        $("#target_cittadini-id").prop('checked', false);
        var dataTarget = $(this).attr("data-target-str"); 
        $("#contact-input-"+dataTarget+"-id").val(null);
        $("#phone-input-"+dataTarget+"-id").val(null);
    });
JS
    ,
    View::POS_READY
);


// IMPRESA
$this->registerJs(
    <<<JS
    $("button[id^='scelta-target']").click(function(event) {        
        event.preventDefault();  
    });

    $("#target_impresa-id").change(function(event) {
        $("#scelta-target-imprese").trigger( "click" );
    });
       
    $("#collapse-imprese").on('show.bs.collapse', function (e) {
        $("#target_impresa-id").attr("disabled", "disabled");        
        var dataTarget = $(this).attr("data-target-str"); 
        
        console.log($("#contact-input-"+dataTarget+"-id").val());
        
        if (!$("#contact-input-"+dataTarget+"-id").val()) {
            $("#contact-input-"+dataTarget+"-id").val('{$email}');
        }        
    });
    
    $("#collapse-imprese").on('shown.bs.collapse', function (e) {
        $("#target_impresa-id").removeAttr("disabled");
        $("#target_impresa-id").prop('checked', true);
        var dataTarget = $(this).attr("data-target-str"); 
        $("#contact-input-"+dataTarget+"-id").focus();
    });
    
    $("#collapse-imprese").on('hide.bs.collapse', function (e) {
        $("#target_impresa-id").attr("disabled", "disabled");   
    });
    
    $("#collapse-imprese").on('hidden.bs.collapse', function (e) {
        $("#target_impresa-id").removeAttr("disabled");
        $("#target_impresa-id").prop('checked', false);
        var dataTarget = $(this).attr("data-target-str"); 
        $("#contact-input-"+dataTarget+"-id").val(null);
        $("#phone-input-"+dataTarget+"-id").val(null);
    });
JS
    ,
    View::POS_READY
);

// ENTI E OPERATORI
$this->registerJs(
    <<<JS
    $("button[id^='scelta-target']").click(function(event) {        
        event.preventDefault();  
    });

    $("#target_enti_operatori-id").change(function(event) {
        $("#scelta-target-enti-operatori").trigger( "click" );
    });
       
    $("#collapse-enti-operatori").on('show.bs.collapse', function (e) {
        $("#target_enti_operatori-id").attr("disabled", "disabled");        
        var dataTarget = $(this).attr("data-target-str"); 
        if (!$("#contact-input-"+dataTarget+"-id").val()) {
            $("#contact-input-"+dataTarget+"-id").val('{$email}');
        } 
    });
    
    $("#collapse-enti-operatori").on('shown.bs.collapse', function (e) {
        $("#target_enti_operatori-id").removeAttr("disabled");
        $("#target_enti_operatori-id").prop('checked', true);
        var dataTarget = $(this).attr("data-target-str"); 
        $("#contact-input-"+dataTarget+"-id").focus();
    });
    
    $("#collapse-enti-operatori").on('hide.bs.collapse', function (e) {
        $("#target_enti_operatori-id").attr("disabled", "disabled");   
    });
    
    $("#collapse-enti-operatori").on('hidden.bs.collapse', function (e) {
        $("#target_enti_operatori-id").removeAttr("disabled");
        $("#target_enti_operatori-id").prop('checked', false);
        var dataTarget = $(this).attr("data-target-str"); 
        $("#contact-input-"+dataTarget+"-id").val(null);
        $("#phone-input-"+dataTarget+"-id").val(null);
    });
JS
    ,
    View::POS_READY
);



/**
 * @var $this yii\web\View
 */
$this->registerCss("
    .collapse-header:hover + .form-check > label {
        text-decoration: underline;
    }
", View::POS_HEAD);


?>

<?php
$form = ActiveForm::begin([
    'options' => [
        'id' => 'preferencies-form',
        'data-fid' => (isset($fid)) ? $fid : 0,
        'data-field' => ((isset($dataField)) ? $dataField : ''),
        'data-entity' => ((isset($dataEntity)) ? $dataEntity : ''),
        'enctype' => 'multipart/form-data',
    ],
]);
?>





<div class="lightgrey-bg-c1 py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>Scelta contatti</h1>
                <p class="tertiary-color">Scegli la tipologia di utente in cui ti rivedi e imposta i canali di contatto</p>
            </div>
            <div class="col-md-3">
                <ul class="wizard-steps text-center">
                    <li class="active-step">
                        <div>1</div>
                    </li>
                    <li class="active-step ">
                        <div>2</div>
                    </li>
                    <li class="active-step current-step">
                        <span class="sr-only">Sei allo step 3 di 4</span>
                        <div>3</div>
                    </li>
                    <li class="">
                        <div>4</div>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>


<div class="container py-5 mb-5 border-bottom border-light">
    <?php
    if (!empty($errorMessage)):
    ?>
        <div class="alert alert-danger" role="alert">
            <?= $errorMessage ?>
        </div>
    <?php
    endif;
    ?>
    
    <div class="cittadini-accordion pb-4">
        <div class="collapse-div collapse-lg shadow-sm border-0 rounded px-4 pt-4 pb-2" role="tablist" style="position:relative">
            <div class="collapse-header" id="cittadini-collapse-heading">
                <button class="m-0 border-0 p-0" id="scelta-target-cittadini" data-toggle="collapse" data-target="#collapse-cittadini" aria-expanded="false" aria-controls="collapse-cittadini">
                </button>
            </div>
            <div class="d-flex align-items-center form-check" style="position:absolute;top:24px;">
                <input type="checkbox" class="mr-2 <?= $model->target_cittadini ? '' : 'not-checked'; ?>" id="target_cittadini-id" name="StepContacts[target_cittadini]" <?= $model->target_cittadini ? 'checked' : ''; ?> >
                <label class="custom-control-label lead color-primary mb-0 border-0 py-0 h-auto" for="target_cittadini-id">
                    <span class="h5 font-weight-normal primary-color">Sono interessato a informazioni per <strong>Cittadini</strong></span>
                </label>
            </div>
            <div id="collapse-cittadini" class="collapse <?= $model->target_cittadini ? 'show' : ''; ?>" role="tabpanel" aria-labelledby="cittadini-collapse-heading" data-target-str='cittadini'>
                <div class="collapse-body mt-4 pt-4 pb-0 border-top tertiary-color">
                    <p class=""><strong>Dove vuoi essere contattato?</strong><br>
                        Per poter ricevere le comunicazioni di tuo interesse è necessario compilare le modalità di contatto</p>
                    <div class="row form-rounded mt-5 pt-3 variable-gutters">
                        <div class="col-md-5">
                            <?= $form->field($model, 'email_cittadini')->textInput(['id' => 'contact-input-cittadini-id']) ?>
                        </div>
                        <div class="col-md-5 offset-md-1">
                            <?= $form->field($model, 'phone_cittadini')->textInput(['id' => 'phone-input-cittadini-id']) ?>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="imprese-accordion py-4">
        <div class="collapse-div collapse-lg shadow-sm border-0 rounded px-4 pt-4 pb-2" role="tablist" style="position:relative">
            <div class="collapse-header" id="imprese-collapse-heading">
                <button class="m-0 border-0 p-0" id="scelta-target-imprese" data-toggle="collapse" data-target="#collapse-imprese" aria-expanded="false" aria-controls="collapse-imprese">
                </button>
            </div>
            <div class="d-flex align-items-center form-check" style="position:absolute;top:24px;">
                <input type="checkbox" class="mr-2 <?= $model->target_impresa ? '' : 'not-checked'; ?>" id="target_impresa-id" name="StepContacts[target_impresa]" <?= $model->target_impresa ? 'checked' : ''; ?> >
                <label class="custom-control-label lead color-primary mb-0 border-0 py-0 h-auto" for="target_impresa-id">
                    <span class="h5 font-weight-normal primary-color">Sono interessato a informazioni per <strong>Imprese</strong></span>
                </label>
            </div>
            <div id="collapse-imprese" class="collapse <?= $model->target_impresa ? 'show' : ''; ?>" role="tabpanel" aria-labelledby="imprese-collapse-heading" data-target-str='impresa'>
                <div class="collapse-body mt-4 pt-4 pb-0 border-top tertiary-color">
                    <p class=""><strong>Dove vuoi essere contattato?</strong><br>
                        Per poter ricevere le comunicazioni di tuo interesse è necessario compilare le modalità di contatto</p>
                    <div class="row form-rounded  variable-gutters mt-5 pt-3">
                        <div class="col-md-5">
                            <?= $form->field($model, 'email_impresa')->textInput(['id' => 'contact-input-impresa-id']) ?>
                        </div>
                        <div class="col-md-5 offset-md-1">
                            <?= $form->field($model, 'phone_impresa')->textInput(['id' => 'phone-input-impresa-id']) ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="enti-operatori-accordion pt-4">
        <div class="collapse-div collapse-lg shadow-sm border-0 rounded px-4 pt-4 pb-2" role="tablist" style="position:relative">
            <div class="collapse-header" id="enti-operatori-collapse-heading">
                <button class="m-0 border-0 p-0" id="scelta-target-enti-operatori" data-toggle="collapse" data-target="#collapse-enti-operatori" aria-expanded="false" aria-controls="collapse-enti-operatori">
                </button>
            </div>
            <div class="d-flex align-items-center form-check" style="position:absolute;top:24px;">
                <input type="checkbox" class="mr-2 <?= $model->target_enti_operatori ? '' : 'not-checked'; ?>" id="target_enti_operatori-id" name="StepContacts[target_enti_operatori]" <?= $model->target_enti_operatori ? 'checked' : ''; ?> >
                <label class="custom-control-label lead color-primary mb-0 border-0 py-0 h-auto" for="target_enti_operatori-id">
                    <span class="h5 font-weight-normal primary-color">Sono interessato a informazioni per <strong>Enti/operatori</strong></span>
                </label>
            </div>
            <div id="collapse-enti-operatori" class="collapse <?= $model->target_enti_operatori ? 'show' : ''; ?>" role="tabpanel" aria-labelledby="enti-operatori-collapse-heading" data-target-str='enti_operatori'>
                <div class="collapse-body mt-4 pt-4 pb-0 border-top tertiary-color">
                    <p class=""><strong>Dove vuoi essere contattato?</strong><br>
                        Per poter ricevere le comunicazioni di tuo interesse è necessario compilare le modalità di contatto</p>
                    <div class="row form-rounded  variable-gutters mt-5 pt-3">
                        <div class="col-md-5">
                            <?= $form->field($model, 'email_enti_operatori')->textInput(['id' => 'contact-input-enti_operatori-id']) ?>
                        </div>
                        <div class="col-md-5 offset-md-1">
                            <?= $form->field($model, 'phone_enti_operatori')->textInput(['id' => 'phone-input-enti_operatori-id']) ?>
                        </div>
                    </div>



                </div>

            </div>


        </div>

    </div>


</div>





    <div class="container d-flex flex-row justify-content-center justify-content-sm-between mb-0 mb-sm-5">
        <div>
            <?php
            echo Html::a(Yii::t('preferenceuser', 'Annulla'), ['/'], [
                'class' => 'btn btn-outline-primary d-none d-sm-block px-5',
                'title' => Yii::t('preferenceuser', 'Torna in home page'),
            ]);
            ?>
        </div>
        <div class="d-flex flex-row ">
            <?php
            echo Html::a(Yii::t('preferenceuser', 'Indietro'), ['preferences'], [
                'class' => 'btn btn-outline-primary mr-2 px-5',
                'title' => Yii::t('preferenceuser', 'Torna allo step precedente'),
            ]);
            ?>
            <?php
            echo Html::submitButton(
                'Continua',
                ['class' => 'btn btn-primary px-5', 'name' => 'submit-action', 'value' => 'forward']
            );
            ?>
        </div>
    </div>

    <div class="mobile-wizard-button mb-5 d-flex justify-content-center d-sm-none">
        <?php
        echo Html::a(Yii::t('preferenceuser', 'Annulla registrazione'), ['/'], [
            'class' => 'text-decoration-none text-secondary pt-4 px-5',
            'title' => Yii::t('preferenceuser', 'Torna in home page'),
        ]);
        ?>
    </div>


<?php ActiveForm::end(); ?>