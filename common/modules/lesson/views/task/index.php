<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel common\modules\lesson\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tasks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-md-3">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
        <div class="col-md-9">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_item',
                'itemOptions' => ['class' => 'item col col-xs-12 col-sm-6 col-md-3 col-lg-4'],
                'options' => ['tag' => false, 'class' => false, 'id' => false],
                // 'itemOptions' => [
                //     'tag' => false,
                //     'class' => 'news-item',
                // ],
                'layout' => '<div class="row"><div class="col-xs-12">{summary}</div></div><div class="row">{items}</div><div class="row"><div class="col-xs-12">{pager}</div></div>',
                // 'summaryOptions' => ['class' => 'summary grey-text'],
                // 'emptyTextOptions' => ['class' => 'empty grey-text'],
            ]) ?>
        </div>
    </div>

</div>
