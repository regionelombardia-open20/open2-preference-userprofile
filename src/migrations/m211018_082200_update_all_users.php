<?php

use yii\db\Migration;
use preference\userprofile\models\Tag;

/**
 * Class m211021_082200_update_all_users
 */
class m211018_082200_update_all_users extends Migration
{

    public function safeUp()
    {

        $allUp = \preference\userprofile\models\UserProfile::find()->all();
        /** @var \preference\userprofile\models\UserProfile $up */
        foreach ($allUp as $up) {
            $up->checkIntegrityLanguage();
        }

        return true;

    }

    public function safeDown()
    {

        return true;
    }

}
