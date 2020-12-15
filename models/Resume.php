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
 * @property string $img_path
 * @property string $birthday
 * @property string $gender
 * @property string $city
 * @property string $email
 * @property string $phone
 * @property int $position
 * @property string $salary
 * @property int $experience
 * @property string|null $jobs
 * @property string|null $note
 * @property string $created_at
 * @property string $updated_at
 * @property int $view_count
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

    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position']);
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
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['user_id', 'position', 'experience', 'view_count'], 'integer'],
            [['jobs', 'note'], 'string'],
            [['first_name', 'middle_name', 'last_name'], 'string', 'max' => 100],
            [['gender'], 'string', 'max' => 4],
            [['city', 'email', 'img_path'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 12],
            [['salary'], 'string', 'max' => 100],
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

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($_POST['Resume']['employment']) {
            foreach ($_POST['Resume']['employment'] as $item) {
                $employment = new Employment();
                $employment->resume_id = $this->id;
                $employment->value = $item;
                $employment->save();
            }
        }

        if ($_POST['Resume']['schedule']) {
            foreach ($_POST['Resume']['schedule'] as $item) {
                $schedule = new Schedule();
                $schedule->resume_id = $this->id;
                $schedule->value = $item;
                $schedule->save();
            }
        }
    }

    public function saveImage($fileName)
    {
        $this->img_path = $fileName;

        return $this->save(false);
    }

}
