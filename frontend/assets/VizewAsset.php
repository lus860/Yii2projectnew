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
        'css/site.css',
        //'css/bootstrap.min.css',
        'css/classy-nav.css',
        'css/font-awesome.min.css',
        'css/themify-icons.css',
        'css/owl.carousel.min.css',
        'css/animate.css',
        'css/magnific-popup.css'

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
        //'yii\bootstrap\BootstrapAsset',
    ];
}
