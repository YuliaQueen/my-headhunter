<?php

use yii\db\Migration;

/**
 * Class m201215_111124_create_table_schedule
 */
class m201215_111124_create_table_schedule extends Migration
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
            '{{%schedule}}',
            [
                'id' => $this->primaryKey(),
                'resume_id' => $this->integer()->notNull()->unsigned(),
                'value' => $this->string(100)->notNull()
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'fk-resume-resume-id',
            'schedule',
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
        $this->dropTable('{{%schedule}}');
    }

}
