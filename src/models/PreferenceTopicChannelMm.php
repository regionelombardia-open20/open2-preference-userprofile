<?php

namespace preference\userprofile\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "preference_topic_channel_mm".
 */
class PreferenceTopicChannelMm extends \preference\userprofile\models\base\PreferenceTopicChannelMm
{
    public function representingColumn()
    {
        return [
        //inserire il campo o i campi rappresentativi del modulo
        ];
    }

    public function attributeHints()
    {
        return [
        ];
    }

/**
 * Returns the text hint for the specified attribute.
 * @param string $attribute the attribute name
 * @return string the attribute hint
 */
    public function getAttributeHint($attribute)
    {
        $hints = $this->attributeHints();
        return isset($hints[$attribute]) ? $hints[$attribute] : null;
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
        ]);
    }

    public function attributeLabels()
    {
        return
        ArrayHelper::merge(
            parent::attributeLabels(),
            [
            ]);
    }

    public static function getEditFields()
    {
        $labels = self::attributeLabels();

        return [
            [
                'slug' => 'cwh_tag_owner_interest_mm_id',
                'label' => $labels['cwh_tag_owner_interest_mm_id'],
                'type' => 'integer',
            ],
            [
                'slug' => 'preference_channel_id',
                'label' => $labels['preference_channel_id'],
                'type' => 'integer',
            ],
            [
                'slug' => 'preference_sending_frequency_id',
                'label' => $labels['preference_sending_frequency_id'],
                'type' => 'integer',
            ],
        ];
    }

/**
 * @return string marker path
 */
    public function getIconMarker()
    {
        return null; //TODO
    }

/**
 * If events are more than one, set 'array' => true in the calendarView in the index.
 * @return array events
 */
    public function getEvents()
    {
        return null; //TODO
    }

/**
 * @return url event (calendar of activities)
 */
    public function getUrlEvent()
    {
        return null; //TODO e.g. Yii::$app->urlManager->createUrl([]);
    }

/**
 * @return color event
 */
    public function getColorEvent()
    {
        return null; //TODO
    }

/**
 * @return title event
 */
    public function getTitleEvent()
    {
        return null; //TODO
    }

}
