<?php

use yii\db\Migration;

/**
 * Class m201215_104602_create_table_employment
 */
class m201215_104602_create_table_employment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%employment}}',
            [
                'id' => $this->primaryKey(),
                'resume_id' => $this->integer()->notNull()->unsigned(),
                'value' => $this->string(100)->notNull()
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'fk-resume-resume-id',
            'employment',
            'resume_id',
            'resume',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employment}}');
    }
}
