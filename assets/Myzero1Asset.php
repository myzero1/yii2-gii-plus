<?php

namespace myzero1\yii2giiplus\assets;

use yii\web\AssetBundle;

/**
 * Theme main asset bundle.
 */
class Myzero1Asset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@myzero1/yii2giiplus/assets';

    /**
     * @inheritdoc
     */
    public $publishOptions = [
        // 'forceCopy' => true,
        'forceCopy' => YII_DEBUG,
    ];

    /**
     * @inheritdoc
     */
    public $css = [
        'css/custom.css',
    ];

    public $js = [
        'js/custom.js',
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
