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
  <div class="col-lg-3 affix-parent d-none d-lg-block">
    <div class="sidebar-wrapper it-line-right-side sidebar-preference h-100 pt-5">
    </div>
  </div>
  <!-- START MAIN -->
  <div class="col-lg-9 mt-4">
    <h1 class="h2 mb-5">Aggiornamento email</h1>
    <p>Abbiamo inviato una email all’indirizzo:
      <?= $email ?>
    </p>
    <p>
      Per usufruire del servizio Lombardia Informa è necessario validare il nuovo indirizzo email cliccando sul link che hai ricevuto all’indirizzo da te indicato ed effettuare nuovamente l’accesso alla piattaforma
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
