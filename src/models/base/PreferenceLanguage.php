<?php

namespace preference\userprofile\models\base;

use open20\amos\core\record\Record;
use preference\userprofile\models\PreferenceTopicChannelMm;
use Yii;
use yii\helpers\Url;

/**
 * This is the base-model class for table "preference_language".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $enable
 * @property string $icon
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 */

class PreferenceLanguage extends Record
{
    const ITA_ID = 1;
    const ENG_ID = 2;
    const FR_ID = 3;
    const DEU_ID = 4;
    const ESP_ID = 4;

/**
 * @inheritdoc
 */
    public static function tableName()
    {
        return 'preference_language';
    }

/**
 * @inheritdoc
 */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 5],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 256],
            [['enable'], 'boolean'],
        ];
    }

/**
 * @inheritdoc
 */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('preferenceuser', 'ID'),
            'name' => Yii::t('preferenceuser', 'Name'),
            'code' => Yii::t('preferenceuser', 'Code'),
            'enable' => Yii::t('preferenceuser', 'Enable'),
            'icon' => Yii::t('preferenceuser', 'Icon'),
            'created_at' => Yii::t('preferenceuser', 'Created at'),
            'updated_at' => Yii::t('preferenceuser', 'Updated at'),
            'deleted_at' => Yii::t('preferenceuser', 'Deleted at'),
            'created_by' => Yii::t('preferenceuser', 'Created by'),
            'updated_by' => Yii::t('preferenceuser', 'Updated by'),
            'deleted_by' => Yii::t('preferenceuser', 'Deleted by'),
        ];
    }

    public function getLabelWithImage()
    {
        $urlImage = Url::to($this->icon);
        return '<span class="d-inline-flex align-items-center"> <img src="'. $urlImage .'" alt="'. $this->name .'" style="width:20px" class="mr-2"/>' . $this->code . '</span>';
//        return '<span>' . $this->code . ' <img src="'. $urlImage .'" alt="'. $this->name .'" width="14px"/></span>';
    }


    public static function getLanguages()
    {
        return self::find()->andWhere(['enable' => 1])->all();
    }

}
