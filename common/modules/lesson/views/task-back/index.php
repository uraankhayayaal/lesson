<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\lesson\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tasks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Task'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        if(!empty($model->user_id)) return null;
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'data-confirm' => Yii::t('app', 'Are you sure?'),
                            'data-method' => 'post',
                        ]);
                    }
                ],
            ],

            [
                'attribute' => 'src',
                'format' => 'raw',
                'value' => function($model){
                    return '<div class="video">'.$model->src.'</div>';
                }
            ],
            'title',
            [
                'attribute' => 'summary',
                'format' => 'html',
                'value' => function($model){
                    return empty($model->summary) ? Yii::t('app', 'No set') : Html::a(Yii::t('app', 'Download'), $model->summary);
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function($model){
                    $html = '<p><span class="label label-default">'.$model::getStatuses()[$model->status].'</span><p>';

                    if(Yii::$app->user->can('redactor')) {
                        switch ($model->status) {
                            case $model::STATUS_NEW:
                                if(!$model->user_id == Yii::$app->user->id && $model::canUserSelect())
                                    $html .= Html::a(Yii::t('app', 'Select to summary'), ['task-back/select', 'id' => $model->id], ['class' => 'btn btn-primary']);
                                break;
                            case $model::STATUS_IN_PROGRESS:
                                if($model->user_id == Yii::$app->user->id)
                                    $html .= Html::a(Yii::t('app', 'Unselect to summary'), ['task-back/unselect', 'id' => $model->id], ['class' => 'btn btn-danger']);
                                else
                                    $html .= Html::a(Yii::t('app', 'Selected to summary'), ['#!'], ['class' => 'btn btn-warning disabled']);
                                break;
                            case $model::STATUS_DONE:
                                true;
                                break;
                        }
                    }
                    return $html;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        if(!empty($model->user_id)) return null;
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'Delete'),
                            'data-confirm' => Yii::t('app', 'Are you sure?'),
                            'data-method' => 'post',
                        ]);
                    }
        
                ],
            ],
        ],
    ]); ?>
</div>
