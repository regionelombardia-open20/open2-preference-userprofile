<?php

namespace preference\userprofile;

use open20\amos\core\module\AmosModule;
use open20\amos\core\module\ModuleInterface;
use Yii;


class Module extends AmosModule implements ModuleInterface {

    public static $CONFIG_FOLDER = 'config';

    /**
     * @var string|boolean the layout that should be applied for views within this module. This refers to a view name
     * relative to [[layoutPath]]. If this is not set, it means the layout value of the [[module|parent module]]
     * will be taken. If this is false, layout will be disabled within this module.
     */
    public $layout = 'main';

    public $config = [];

    /**
     * @inheritdoc
     */
    public static function getModuleName() {
        return "preferenceuser";
    }

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
        // initialize the module with the configuration loaded from config.php
        $config = require(__DIR__ . DIRECTORY_SEPARATOR . self::$CONFIG_FOLDER . DIRECTORY_SEPARATOR . 'config.php');

        Yii::configure($this, $config);
    }

    /**
     * @inheritdoc
     */
    public function getWidgetIcons() {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function getWidgetGraphics() {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getDefaultModels() {
        return [
        ];
    }

}
