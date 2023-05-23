<?php

namespace preference\userprofile\models;

use preference\userprofile\models\PreferenceLanguageUserMm;
use yii\helpers\ArrayHelper;
use open20\amos\admin\models\UserProfile as UserProfileBase;
use yii\helpers\VarDumper;
use Yii;


class UserProfile extends UserProfileBase
{

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['pc_request_delete_date', 'safe'],
            [['preference_origin_system_id'], 'exist', 'skipOnError' => true, 'targetClass' => PreferenceOriginSystem::className(), 'targetAttribute' => ['preference_origin_system_id' => 'id']],
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferenceOriginSystem()
    {
        return $this->hasOne(PreferenceOriginSystem::className(), ['id' => 'preference_origin_system_id']);
    }

    public function getOriginSystemName()
    {
        return $this->preferenceOriginSystem->name;
    }

    public function getLanguagesUserMm()
    {
        return $this->hasMany(\preference\userprofile\models\PreferenceLanguageUserMm::class, ['user_id' => 'user_id']);
    }

    public function getLanguages()
    {
        return $this->hasMany(PreferenceLanguage::class, ['id' => 'preference_language_id'])
            ->via('languagesUserMm');
    }

    public function checkIntegrityLanguage()
    {
        $languages = PreferenceLanguageUserMm::find()->andWhere(['user_id' => $this->user_id])->asArray()->all();
        if (count($languages) < 1) {
            $transaction = Yii::$app->db->beginTransaction();
            try {

                $userLanguage = new PreferenceLanguageUserMm();
                $userLanguage->user_id = $this->user_id;
                $userLanguage->preference_language_id = PreferenceLanguage::ITA_ID;
                $userLanguage->save(false);

                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
        }
    }

}
