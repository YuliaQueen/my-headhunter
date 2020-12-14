<?php

use yii\db\Migration;

/**
 * Class m201214_111012_create_table_position
 */
class m201214_111012_create_table_position extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        };

        $this->createTable(
            '{{%position}}',
            [
                'id' => $this->primaryKey(),
                'position_title' => $this->string(250)->notNull()
            ],
            $tableOptions
        );

        $this->insert('position', ['id' => '1', 'position_title' => 'Администратор баз данных']);
        $this->insert('position', ['id' => '2', 'position_title' => 'Аналитик']);
        $this->insert('position', ['id' => '3', 'position_title' => 'Арт-директор']);
        $this->insert('position', ['id' => '4', 'position_title' => 'Инженер']);
        $this->insert('position', ['id' => '5', 'position_title' => 'Компьютерная безопасность']);
        $this->insert('position', ['id' => '6', 'position_title' => 'Контент']);
        $this->insert('position', ['id' => '7', 'position_title' => 'Маркетинг']);
        $this->insert('position', ['id' => '8', 'position_title' => 'Мультимедиа']);
        $this->insert('position', ['id' => '9', 'position_title' => 'Оптимизация сайта (SEO)']);
        $this->insert('position', ['id' => '10', 'position_title' => 'Передача данных и доступ в интернет']);
        $this->insert('position', ['id' => '11', 'position_title' => 'Программирование, Разработка']);
        $this->insert('position', ['id' => '12', 'position_title' => 'Продажи']);
        $this->insert('position', ['id' => '13', 'position_title' => 'Продюсер']);
        $this->insert('position', ['id' => '14', 'position_title' => 'Системный администратор']);
        $this->insert('position', ['id' => '15', 'position_title' => 'Системы управления предприятием (ERP)']);
        $this->insert('position', ['id' => '16', 'position_title' => 'Сотовые, Беспроводные технологии']);
        $this->insert('position', ['id' => '17', 'position_title' => 'Стартапы']);
        $this->insert('position', ['id' => '18', 'position_title' => 'Телекоммуникации']);
        $this->insert('position', ['id' => '19', 'position_title' => 'Тестирование']);
        $this->insert('position', ['id' => '20', 'position_title' => 'Технический писатель']);
        $this->insert('position', ['id' => '21', 'position_title' => 'Управление проектами']);
        $this->insert('position', ['id' => '22', 'position_title' => 'Электронная коммерция']);
        $this->insert('position', ['id' => '23', 'position_title' => 'CRM системы']);
        $this->insert('position', ['id' => '24', 'position_title' => 'Web инженер']);
        $this->insert('position', ['id' => '25', 'position_title' => 'Web мастер']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%position}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201214_111012_create_table_position cannot be reverted.\n";

        return false;
    }
    */
}
