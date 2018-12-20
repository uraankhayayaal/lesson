<?php

namespace common\modules\lesson\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

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
class Task extends \common\models\Task
{
    const STATUS_NEW = 10;
    const STATUS_IN_PROGRESS = 20;
    const STATUS_DONE = 30;

    const MAX_COUNT_IN_PROGRESS_FOR_ONE_USER = 3;

    public $file;

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
            [['is_publish', 'status', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['title', 'summary'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, jpg'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('app', 'Title'),
            'src' => Yii::t('app', 'Src (Youtube share code)'),
            'description' => Yii::t('app', 'Description'),
            'summary' => Yii::t('app', 'Summary'),
            'is_publish' => Yii::t('app', 'Is Publish'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->upload();
            if($this->status == self::STATUS_NEW) $this->user_id = null;
            return parent::beforeSave($insert);
        } else {
            return false;
        }
    }

    public function upload()
    {
        $this->file = UploadedFile::getInstance($this, 'file');
        if(empty($this->file)) return null;
        $fileName =  $this->file->baseName . '.' . $this->file->extension;
        \yii\helpers\BaseFileHelper::createDirectory(Yii::getAlias('@frontend/web/images/task/'), $mode = 0775, $recursive = true );
        if($this->file->saveAs(Yii::getAlias('@frontend/web/images/task/' . $fileName)))
        {
            $this->summary = '/images/task/' . $fileName;
            return true;
        }
        return false;
    }

    public function selectForSummary()
    {
        $countOfUserInProgressTasks = self::find()->where(['user_id' => Yii::$app->user->id, 'status' => self::STATUS_IN_PROGRESS])->count();
        if($countOfUserInProgressTasks < self::MAX_COUNT_IN_PROGRESS_FOR_ONE_USER){
            $this->user_id = Yii::$app->user->id;
            $this->status = self::STATUS_IN_PROGRESS;            
            return $this->save();
        }
        return false;
    }

    public function unSelectForSummary()
    {
        if($this->user_id == Yii::$app->user->id){
            $this->status = self::STATUS_NEW;
            return $this->save();
        }
        return false;
    }

    public static function canUserSelect()
    {
        $countOfUserInProgressTasks = self::find()->where(['user_id' => Yii::$app->user->id, 'status' => self::STATUS_IN_PROGRESS])->count();
        return $countOfUserInProgressTasks < self::MAX_COUNT_IN_PROGRESS_FOR_ONE_USER;
    }
}
