<?php

use yii\helpers\Html;

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"><?= Yii::t('app', Yii::$app->name) ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <?= Html::a(Yii::t('app', 'Home'), ['/site/index'], ['class' => 'nav-link']) ?>
      </li>
      <li class="nav-item">
        <?= Html::a(Yii::t('app', 'Lessons'), ['/lesson/task/index'], ['class' => 'nav-link']) ?>
      </li>
      <li class="nav-item">
        <?= Html::a(Yii::t('app', 'About'), ['/site/about'], ['class' => 'nav-link']) ?>
      </li>
      <li class="nav-item">
        <?= Html::a(Yii::t('app', 'Contact'), ['/site/contact'], ['class' => 'nav-link']) ?>
      </li>
    <?php if (Yii::$app->user->isGuest) { ?>
      <li class="nav-item">
        <?= Html::a(Yii::t('app', 'Signup'), ['/site/signup'], ['class' => 'nav-link']) ?>
      </li>
      <li class="nav-item">
        <?= Html::a(Yii::t('app', 'Login'), ['/site/login'], ['class' => 'nav-link']) ?>
      </li>
    <?php } else { ?>
      <li class="nav-item">
        <?= Html::a(Yii::t('app', 'Logout').' ('.Yii::$app->user->identity->username.')', ['/site/logout'], ['data' => ['method' => 'post'], 'class' => 'nav-link']) ?>
      </li>
    <?php } ?>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>