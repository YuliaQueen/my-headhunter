<?php

namespace app\models;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $resume_id
 * @property string $value
 *
 * @property Resume $resume
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resume_id', 'value'], 'required'],
            [['resume_id'], 'integer'],
            [['value'], 'string', 'max' => 100],
            [
                ['resume_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Resume::className(),
                'targetAttribute' => ['resume_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resume_id' => 'Resume ID',
            'value' => 'Value',
        ];
    }

    /**
     * Gets query for [[Resume]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getResume()
    {
        return $this->hasOne(Resume::className(), ['id' => 'resume_id']);
    }

}
