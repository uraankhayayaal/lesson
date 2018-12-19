<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\lesson\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
