<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    [NAMESPACE_HERE]
 * @category   CategoryName
 */

use open20\amos\core\forms\ActiveForm;
use open20\amos\core\helpers\Html;
use yii\helpers\VarDumper;
?>
<!-- seconda pagina di conferma registrazione (pagina feedback conferma validazione email di autenticazione) -->
<div class="py-5 user-success">
    <div class="container">
        <div class="row variable-gutters">
            <div class="col-md-4 d-none d-md-block">
                <img class="img-fluid" src="/img/conferma.png" title="immagine di conferma" alt="immagine di conferma"/>
            </div>
            <div class="col-12 col-md-8 px-3">
                <h1 class="h2">Hai confermato la tua registrazione!</h1>
                <img class="img-fluid mr-auto ml-auto d-block d-md-none" src="/img/conferma.png" title="immagine di conferma" alt="immagine di conferma"/>
                <p class="tertiary-color mt-5">
                    Ti ringraziamo per aver confermato la tua <strong>registrazione.</strong> Il tuo profilo è ora <strong>attivo.</strong><br>
                    Puoi <strong>accedere</strong> al servizio Lombardia Informa e gestire le tue preferenze.
                </p>
                <p class="tertiary-color">
                    Ti ricordiamo che per ricevere le comunicazioni da Regione Lombardia e rimanere sempre informato, devi <strong>verificare</strong> le modalità di <strong>contatto</strong> che hai indicato in fase di registrazione.
                </p>
                <div class="d-flex justify-content-md-end justify-content-center mt-5">
                    <a href="/preferenceuser/preference/settings" class="btn btn-primary mb-2 float-sm-right" title="accedi all'area riservata">Accedi</a>
                </div>
            </div>
        </div>
    </div>
</div>