<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class Bootstrap4Asset extends AssetBundle
{
    public $sourcePath = '@vendor/twbs/bootstrap/dist/';

    public $js = [
        'js/bootstrap.min.js',
    ];

    public $css = [
        'css/bootstrap.min.css',
        'css/bootstrap-grid.min.css',
        'css/bootstrap-reboot.min.css',
    ];
}
