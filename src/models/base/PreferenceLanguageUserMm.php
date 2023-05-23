<?php

namespace preference\userprofile\models\base;

use open20\amos\core\record\Record;
use preference\userprofile\models\PreferenceTopicChannelMm;
use preference\userprofile\models\UserProfile;
use Yii;
use yii\helpers\Url;

/**
 * This is the base-model class for table "preference_language_user_mm".
 *
 * @property integer $id
 * @property integer $preference_language_id
 * @property integer $user_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 */
class PreferenceLanguageUserMm extends Record
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preference_language_user_mm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['preference_language_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('preferenceuser', 'ID'),
            'preference_language_id' => Yii::t('preferenceuser', 'Ref language'),
            'user_id' => Yii::t('preferenceuser', 'Ref language'),
            'created_at' => Yii::t('preferenceuser', 'Created at'),
            'updated_at' => Yii::t('preferenceuser', 'Updated at'),
            'deleted_at' => Yii::t('preferenceuser', 'Deleted at'),
            'created_by' => Yii::t('preferenceuser', 'Created by'),
            'updated_by' => Yii::t('preferenceuser', 'Updated by'),
            'deleted_by' => Yii::t('preferenceuser', 'Deleted by'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(\preference\userprofile\models\PreferenceLanguage::className(), ['id' => 'preference_language_id']);
    }

}
