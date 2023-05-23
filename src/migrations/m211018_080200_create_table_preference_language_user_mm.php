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
 * Class m211021_080200_create_table_preference_language_user_mm
 */
class m211018_080200_create_table_preference_language_user_mm extends AmosMigrationTableCreation
{
    /**
     * @inheritdoc
     */
    protected function setTableName()
    {
        $this->tableName = '{{%preference_language_user_mm}}';
    }

    /**
     * @inheritdoc
     */
    protected function setTableFields()
    {
        $this->tableFields = [
            'id' => $this->primaryKey(),
            'preference_language_id' => $this->integer(11)->null()->comment('ref to language'),
            'user_id' => $this->integer(11)->null()->comment('ref to user'),
        ];
    }

    protected function addForeignKeys()
    {
        $this->addForeignKey('fk_preference_language_user_mm_user', $this->tableName, 'user_id', 'user', 'id');
        $this->addForeignKey('fk_preference_language_user_mm_preference_language', $this->tableName, 'preference_language_id', 'preference_language', 'id');
        parent::addForeignKeys();
    }

    /**
     * @inheritdoc
     */
    protected function beforeTableCreation()
    {
        parent::beforeTableCreation();
        $this->setAddCreatedUpdatedFields(true);
    }

}

