<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CustomAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //Yii demo css
        //'css/site.css',
        // Bootstrap core CSS
        'css/bootstrap.min.css',
        'css/plugins/iCheck/custom.css', 
        //Animation CSS 
        'css/animate.css',
        'font-awesome/css/font-awesome.min.css',    
        // Custom styles for this template 
        'css/style.css',
        'css/plugins/chosen/bootstrap-chosen.css'
    ];
    public $js = [
        //Mainly scripts
        'js/jquery-3.2.1.js',
        'js/bootstrap.min.js',
        'js/plugins/metisMenu/jquery.metisMenu.js',
        'js/plugins/slimscroll/jquery.slimscroll.min.js',
        // 'js/plugins/dropzone/dropzone.js',
        'js/plugins/iCheck/icheck.min.js',  
        // Custom and plugin javascript
        'js/inspinia.js',
        'js/plugins/pace/pace.min.js',
        'js/plugins/wow/wow.min.js',
        'js/plugins/chosen/chosen.jquery.js',
        'js/plugins/slick/slick.min.js',
        'js/plugins/chosen/ajax-chosen.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
