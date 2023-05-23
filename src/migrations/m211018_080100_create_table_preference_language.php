`<?php

/**
 * Aria S.p.A.
 * OPEN 2.0
 *
 *
 * @package    open20\amos\core\migration
 * @category   CategoryName
 */

use open20\amos\core\migration\AmosMigrationTableCreation;

/**
 * Class m211018_080100_create_table_preference_language
 */
class m211018_080100_create_table_preference_language extends AmosMigrationTableCreation
{
    /**
     * @inheritdoc
     */
    protected function setTableName()
    {
        $this->tableName = '{{%preference_language}}';
    }

    /**
     * @inheritdoc
     */
    protected function setTableFields()
    {
        $this->tableFields = [
            'id' => $this->primaryKey(),
            'name' => $this->string(256)->null()->comment('name'),
            'code' => $this->string(5)->null()->comment('code'),
            'enable' => $this->boolean()->defaultValue(0)->comment('language enable'),
            'icon' => $this->string(256)->null()->comment('icon path'),
        ];
    }

    /**
     * @inheritdoc
     */
    protected function beforeTableCreation()
    {
        parent::beforeTableCreation();
        $this->setAddCreatedUpdatedFields(true);
    }

    /**
     * @inheritdoc
     */
    protected function afterTableCreation()
    {
        $mysqlDateFormat = 'Y-m-d H:i:s';
        $this->insert($this->tableName, ['id' => 1, 'name' => 'Italiano', 'code' => 'ITA', 'enable' => true, 'created_at' => date($mysqlDateFormat),
            'icon' => '/img/flags/italy.png']);
        $this->insert($this->tableName, ['id' => 2, 'name' => 'Inglese', 'code' => 'ENG', 'enable' => true, 'created_at' => date($mysqlDateFormat),
            'icon' => '/img/flags/united-kingdom.png']);
        $this->insert($this->tableName, ['id' => 3, 'name' => 'Francese', 'code' => 'FR', 'enable' => false, 'created_at' => date($mysqlDateFormat),
            'icon' => '/img/flags/france.png']);
        $this->insert($this->tableName, ['id' => 4, 'name' => 'Tedesco', 'code' => 'DEU', 'enable' => false, 'created_at' => date($mysqlDateFormat),
            'icon' => '/img/flags/germany.png']);
        $this->insert($this->tableName, ['id' => 5, 'name' => 'Spagnolo', 'code' => 'ESP', 'enable' => false, 'created_at' => date($mysqlDateFormat),
            'icon' => '/img/flags/spain.png']);
    }

}

