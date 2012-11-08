<?php

/**
 * Description of Request
 *
 * @author Aleksei Prokopov <a.prokopov@edss.ee>
 */
class Request
{

    public static function isAjaxRequest()
    {
        return Yii::app()->request->isAjaxRequest;
    }

    public static function checkPost($name, $value)
    {
        return Request::getPost($name) === $value;
    }

    public static function getPost($name, $defaultValue = null)
    {
        return Yii::app()->request->getPost($name, $defaultValue);
    }

    public static function getParam($name, $defaultValue = null)
    {
        return Yii::app()->request->getParam($name, $defaultValue);
    }

}

