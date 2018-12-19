<?php

use yii\helpers\Html;

?>


<div class="card">
  <div class="card-img-top video">
    <?= $model->src ?>
  </div>
  <div class="card-body">
    <p class="card-text"><?= Html::a(Html::encode($model->title), ['view', 'id' => $model->id]) ?></p>
  </div>
</div>