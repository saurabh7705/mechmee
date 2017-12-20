<?php 
$baseurl=Yii::app()->baseUrl;
$cs = Yii::app()->clientScript;
$jquery_url = "http://52.221.250.196/js/jquery.min.js";
$cs->scriptMap = array('jquery.min.js'=> $jquery_url, 'jquery.js'=>$jquery_url);
$cs->registerCoreScript('jquery');
Yii::app()->clientScript->addPackage('other-required-scripts', array(
    'baseUrl'=>$baseurl, // or basePath
    'js'=>array(
    	"js/modernizr-2.5.3-respond-1.1.0.min.js",
    	"js/bootstrap-3.0.2.min.js",
    	"js/wow.min.js",
    ),
    'depends'=>array('jquery')
));

Yii::app()->clientScript->registerPackage('other-required-scripts');
?>