<?php

namespace backend\widgets\redactor;
use yii\web\AssetBundle;

class RedactorFixAsset extends AssetBundle
{
		public $sourcePath = '@backend/widgets/redactor/src/';

    public $css = [
    ];
    public $js = [
				'redactor.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
