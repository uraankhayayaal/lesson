<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\modules\lesson\models\Task */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tasks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="task-view">

    <div class="video">
        <?= $model->src ?>
    </div>

    <div class="media">
        <div class="media-body">
            <h1 class="mt-0"><?= Html::encode($this->title) ?></h1>
            <p><?= $model->description ?></p>
            <p><?= Yii::t('app', 'Published at') ?>: <?= Yii::$app->formatter->asDatetime($model->created_at) ?></p>
        </div>
    </div>

    <?php if(!empty($model->summary)) { ?>
    <h3><?= Yii::t('app', 'Summary') ?></h3>
    <?= \yii2assets\pdfjs\PdfJs::widget([
        'url'=> Url::base().$model->summary
    ]); ?>
    <?php } ?>

</div>
