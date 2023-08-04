<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class TagsInputAsset extends AssetBundle
{
    public $basePath = '@webroot/tagsInput';
    public $baseUrl = '@web/tagsInput';
    public $css = ['tagsInput.css'];
    public $js = ['tagsInput.js'];
    public $depends = [JqueryAsset::class];
}