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
		'static/css/bootstrap.min.css?v=3.3.6',
		'static/css/font-awesome.min.css?v=4.4.0',
		'static/css/animate.min.css',
		'static/css/style.min.css?v=4.1.0',
		'static/css/plugins/sweetalert/sweetalert.css',
		'static/js/plugins/layer2.0/laydate/need/laydate.css',
		'static/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
		'static/css/plugins/toastr/toastr.min.css',
		'static/js/plugins/image-picker/image-picker.css',
		'static/css/my.style.css',
	];

	public $js = [
		'static/js/plugins/sweetalert/sweetalert.min.js',
		'static/js/plugins/layer2.0/laydate/laydate.js',
		'static/js/plugins/layer3.1.1/layer.js',
		'static/js/plugins/prettyfile/bootstrap-prettyfile.js',
		'static/js/plugins/toastr/toastr.min.js',
		'static/js/plugins/image-picker/image-picker.min.js',
		'static/js/jquery.backstretch.min.js',
		'static/js/jcy.min.js?v=1.0.1',
	];

    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
}
