<?php

use yii\db\Migration;

/**
 * Class m201214_113605_create_table_resume
 */
class m201214_113605_create_table_resume extends Migration
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
            '{{%resume}}',
            [
                'id' => $this->primaryKey(),
                'user_id' => $this->integer(10)->unsigned(),
                'first_name' => $this->string(100)->notNull(),
                'middle_name' => $this->string(100)->notNull(),
                'last_name' => $this->string(100)->notNull(),
                'img_path' => $this->string(250)->null(),
                'birthday' => $this->date()->notNull(),
                'gender' => $this->string(4)->notNull()->defaultValue(0),
                'city' => $this->string(250)->notNull(),
                'email' => $this->string(250)->notNull(),
                'phone' => $this->string(12)->notNull(),
                'position' => $this->integer(11)->notNull(),
                'salary' => $this->string(100)->notNull(),
                'experience' => $this->tinyInteger(10)->defaultValue(0),
                'jobs' => $this->text()->defaultValue(null),
                'note' => $this->text()->defaultValue(null),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime()->notNull(),
                'view_count' => $this->integer(11)->notNull()->defaultValue(0),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'fk-position-position-id',
            'resume',
            'position',
            'position',
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
        $this->dropTable('{{%resume}}');
    }
}
