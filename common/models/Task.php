<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $title
 * @property string $src
 * @property string $description
 * @property string $summary
 * @property int $is_publish
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_id
 *
 * @property User $user
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'src', 'created_at', 'updated_at'], 'required'],
            [['src', 'description'], 'string'],
            [['is_publish', 'status', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['title', 'summary'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'src' => Yii::t('app', 'Src'),
            'description' => Yii::t('app', 'Description'),
            'summary' => Yii::t('app', 'Summary'),
            'is_publish' => Yii::t('app', 'Is Publish'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
