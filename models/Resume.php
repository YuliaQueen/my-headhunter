<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $birthday
 * @property string $gender
 * @property string $city
 * @property string $email
 * @property string $phone
 * @property string $position
 * @property string $salary
 * @property string $employment
 * @property string $schedule
 * @property int $experience
 * @property string|null $jobs
 * @property string|null $note
 * @property string $created_at
 * @property string $updated_at
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'user_id',
                    'first_name',
                    'middle_name',
                    'last_name',
                    'birthday',
                    'city',
                    'email',
                    'phone',
                    'position',
                    'salary'
                ],
                'required'
            ],
            [['birthday', 'created_at', 'updated_at', 'employment', 'schedule'], 'safe'],
            [['user_id', 'experience'], 'integer'],
            [['jobs', 'note'], 'string'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 100],
            [['gender'], 'string', 'max' => 4],
            [['city', 'email'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 12],
            [['position', 'salary'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'last_name' => 'Фамилия',
            'birthday' => 'Дата рождения',
            'gender' => 'Пол',
            'city' => 'Город',
            'email' => 'Электронная почта',
            'phone' => 'Телефон',
            'position' => 'Специализация',
            'salary' => 'Зарплата',
            'employment' => 'Занятость',
            'schedule' => 'График работы',
            'experience' => 'Опыт работы',
            'jobs' => 'Jobs',
            'note' => 'О себе',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getSelectItems()
    {
        return [

            '1' => 'Администратор баз данных',
            '2' => 'Аналитик',
            '3' => 'Арт-директор',
            '4' => 'Инженер',
            '5' => 'Компьютерная безопасность',
            '6' => 'Контент',
            '7' => 'Маркетинг',
            '8' => 'Мультимедиа',
            '9' => 'Оптимизация сайта (SEO)',
            '10' => 'Передача данных и доступ в интернет',
            '11' => 'Программирование, Разработка',
            '12' => 'Продажи',
            '13' => 'Продюсер',
            '14' => 'Развитие бизнеса',
            '15' => 'Системный администратор',
            '16' => 'Системы управления предприятием (ERP)',
            '17' => 'Сотовые, Беспроводные технологии',
            '18' => 'Стартапы',
            '19' => 'Телекоммуникации',
            '20' => 'Тестирование',
            '21' => 'Технический писатель',
            '22' => 'Управление проектами',
            '23' => 'Электронная коммерция',
            '24' => 'CRM системы',
            '25' => 'Web инженер',
            '26' => 'Web мастер',
        ];
    }

    public static function getScheduleCheckboxItems()
    {
        return [
            '0' => 'Полный день',
            '1' => 'Сменный график',
            '2' => 'Гибкий график',
            '3' => 'Удаленная работа',
        ];
    }

    public static function getEmploymentCheckboxItems()
    {
        return [
            '0' => 'Полная занятость',
            '1' => 'Частичная занятость',
            '2' => 'Проектная/Временная работа',
            '3' => 'Волонтёрство',
            '4' => 'Стажировка'
        ];
    }

    public static function getSelectParams()
    {
        return ['prompt' => 'Выберите профессию...', 'class' => 'nselect-1'];
    }

    /**
     * @param $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $this->birthday = date('Y-m-d', strtotime($this->birthday));

        return true;
    }

}
