<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'css/bootstrap-datepicker.css',
        'css/jquery.nselect.css',
        'css/jquery-editable-select.css',
        'css/tagsinput.css',
        'css/main.css',
        '//fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap'
    ];
    public $js = [
        'js/jquery-3.5.1.js',
        'js/main.js',
        'js/bootstrap-datepicker.js',
        'js/bootstrap-datepicker.ru.min.js',
        'js/jquery.nselect.min.js',
        'js/jquery-editable-select.js',
        'js/tagsinput.js',
        '//kit.fontawesome.com/a4e584b747.js'
    ];


    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
