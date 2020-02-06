<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class VizewAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
    ];
    public $js = [
        'js/jquery/jquery-2.2.4.min.js',
        'js/bootstrap/popper.min.js',
        'js/bootstrap/bootstrap.min.js',
        'js/plugins/plugins.js',
        'js/active.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
