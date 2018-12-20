<?php

use yii\helpers\Url;

?>

<?php if(!empty($model->summary)) { ?>
    <h3><?= Yii::t('app', 'Summary') ?></h3>
    <?= \yii2assets\pdfjs\PdfJs::widget([
        'url'=> $model->summary
    ]); ?>
<?php }else{ ?>
    <p><?= Yii::t('app', 'Summary no set') ?></p>
<?php } ?>