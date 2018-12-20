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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-md-7">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'title',
                    [
                        'attribute' => 'src',
                        'format' => 'raw',
                        'value' => function($model){
                            return '<div class="video">'.$model->src.'</div>';
                        }
                    ],
                    'description:ntext',
                    'summary',
                    [
                        'attribute' => 'status',
                        'format' => 'html',
                        'value' => function($model){
                            return $model::getStatuses()[$model->status];
                        }
                    ],
                    'is_publish',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
        <div class="col-md-5">
            <?= $this->render('_pdf', ['model' => $model]); ?>
        </div>
    </div>

</div>
