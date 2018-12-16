<?php
/**
 * Created by PhpStorm.
 * User: maicon
 * Date: 11/12/18
 * Time: 21:54
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class AppSistema extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'sistema/bower_components/bootstrap/dist/css/bootstrap.min.css',
        'sistema/bower_components/font-awesome/css/font-awesome.min.css',
        'sistema/bower_components/Ionicons/css/ionicons.min.css',
        'sistema/dist/css/AdminLTE.min.css',
        'sistema/dist/css/skins/_all-skins.min.css',
        'sistema/bower_components/morris.js/morris.css',
        'sistema/bower_components/jvectormap/jquery-jvectormap.css',
        'sistema/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'sistema/bower_components/bootstrap-daterangepicker/daterangepicker.css',
        'sistema/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'sistema/css/style.css',
    ];

    public $js = [
        'sistema/bower_components/jquery/dist/jquery.min.js',
        'sistema/bower_components/jquery-ui/jquery-ui.min.js',
        'sistema/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'sistema/bower_components/raphael/raphael.min.js',
        'sistema/bower_components/morris.js/morris.min.js',
        'sistema/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'sistema/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'sistema/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'sistema/bower_components/jquery-knob/dist/jquery.knob.min.js',
        'sistema/bower_components/moment/min/moment.min.js',
        'sistema/bower_components/bootstrap-daterangepicker/daterangepicker.js',
        'sistema/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'sistema/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'sistema/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',
        'sistema/bower_components/fastclick/lib/fastclick.js',
        'sistema/dist/js/adminlte.min.js',
        'sistema/dist/js/pages/dashboard.js',
        'sistema/dist/js/demo.js',

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
