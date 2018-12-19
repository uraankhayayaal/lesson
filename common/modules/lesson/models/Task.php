<?php

namespace common\modules\lesson\models;

use Yii;
use yii\behaviors\TimestampBehavior;

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
 */
class Task extends \common\models\Task
{
    const STATUS_NEW = 10;
    const STATUS_IN_PROGRESS = 20;
    const STATUS_DONE = 30;

    public static function getStatuses(){
        return  [
            self::STATUS_NEW => Yii::t('app', 'New'),
            self::STATUS_IN_PROGRESS => Yii::t('app', 'In progress'),
            self::STATUS_DONE => Yii::t('app', 'Done'),
        ];
    }
    
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['title', 'src'], 'required'],
            [['src', 'description'], 'string'],
            [['is_publish', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'summary'], 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('app', 'Title'),
            'src' => Yii::t('app', 'Src'),
            'description' => Yii::t('app', 'Description'),
            'summary' => Yii::t('app', 'Summary'),
            'is_publish' => Yii::t('app', 'Is Publish'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
