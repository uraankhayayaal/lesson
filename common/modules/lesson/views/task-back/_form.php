<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\lesson\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <div class="row">
        <div class="col-md-7">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <div class="row">
                <div class="col-xs-6">
                    <?= $form->field($model, 'is_publish')->checkbox(['label' => $model->getAttributeLabel('is_publish')]); ?>
                </div>
                <div class="col-xs-6">
                    <?= $form->field($model, 'status')->dropDownList(\common\modules\lesson\models\Task::getStatuses()); ?>
                </div>
            </div>

            <?= $form->field($model, 'src')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description')->widget(\backend\widgets\redactor\RedactorWidget::className(), [
                'settings' => [
                    'lang' => 'ru',
                    'minHeight' => 200,
                    // 'imageUpload' => Url::to(['image-upload']),
                    // 'fileUpload' => Url::to(['file-upload']),
                    // 'imageManagerJson' => Url::to(['images-get']),
                    // 'fileManagerJson' => Url::to(['files-get']),
                    'plugins' => [
                        'fullscreen',
                        // 'imagemanager',
                        // 'filemanager',
                        'table',
                        'video',
                    ],
                ],
            ]); ?>


            <?= $form->field($model, 'file')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-5">
            <?= $this->render('_pdf', ['model' => $model]); ?>
        </div>
    </div>
</div>
