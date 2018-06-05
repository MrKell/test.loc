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
class InsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/bootstrap.min.css',
        'font-awesome/css/font-awesome.css',
        'css/animate.css',
        'css/style.css',
        'css/plugins/steps/jquery.steps.css',
        'css/plugins/iCheck/custom.css',
        'css/plugins/chosen/bootstrap-chosen.css'
    ];
    public $js = [
        // Mainly scripts
        // 'js/jquery-3.1.1.min.js',
        //'js/bootstrap.min.js',
        'js/plugins/metisMenu/jquery.metisMenu.js',
        'js/plugins/slimscroll/jquery.slimscroll.min.js',
    
        //Custom and plugin javascript
        'js/inspinia.js',
        'js/plugins/pace/pace.min.js',
        '/js/plugins/chosen/chosen.jquery.js',

        //Flot>
        'js/plugins/flot/jquery.flot.js',
        'js/plugins/flot/jquery.flot.tooltip.min.js',
        'js/plugins/flot/jquery.flot.resize.js',
    
        //ChartJS
        'js/plugins/chartJs/Chart.min.js',
    
        //Peity>
        'js/plugins/peity/jquery.peity.min.js',
        //Peity demo
        'js/demo/peity-demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
