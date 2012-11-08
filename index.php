<?php

date_default_timezone_set('America/New_York');
// change the following paths if necessary
$yii    = dirname(__FILE__).'/framework/yii.php';
$config = dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG', true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);

require_once($yii);
$app                       = Yii::createWebApplication($config);
// attaching a handler to application start
Yii::app()->onBeginRequest = function($event)
        {
            return ob_start("ob_gzhandler"); // starting output buffering with gzip handler
        };
// attaching a handler to application end
Yii::app()->onEndRequest = function($event)
        {
            return ob_end_flush(); // releasing output buffer
        };

function getParam($name, $defaultValue = null)
{
    return Yii::app()->request->getParam($name, $defaultValue);
}

function getPost($name, $defaultValue = null)
{
    return Yii::app()->request->getPost($name, $defaultValue);
}

function dump($var, $depth = 10, $highlight = true)
{
    echo '<pre>';
    CVarDumper::dump($var, $depth, $highlight);
    echo '</pre>';
}


$app->run();
