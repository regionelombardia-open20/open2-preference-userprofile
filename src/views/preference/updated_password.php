<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    [NAMESPACE_HERE]
 * @category   CategoryName
 */

use open20\amos\admin\AmosAdmin;
use open20\amos\core\helpers\Html;
use yii\helpers\Url;
?>

<div class="row variable-gutters my-5">
  <!-- START SIDEBAR -->
  <div class="col-lg-3 col-md-4 affix-parent">
    <div class="sidebar-wrapper pt-4 sidebar-preference it-line-right-side h-100 affix-parent">
    </div>
  </div>
  <!-- START MAIN -->
  <div class="col-lg-9 mt-4">
    <h1 class="h2 mb-5">Aggiornamento password </h1>
    <p>La password è stata aggiornata con successo. </p>
    <p>
      Per usufruire del servizio Lombardia Informa è necessario effettuare nuovamente l’accesso alla piattaforma utilizzando le nuove credenziali.
    </p>
    <div class="d-flex justify-content-md-start">
      <?php
        echo Html::a(
            Yii::t('preferenceuser', 'Accedi'),
            Url::to('/preferenceuser/preference/settings'),
            [
                'class' => 'btn btn-primary mb-2 px-5',
                'title' => Yii::t('preferenceuser', 'Accedi all\'area riservata'),
            ]
        );
      ?>
    </div>
  </div>
</div>
