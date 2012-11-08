<?php

/**
 * Description of TestController
 *
 * @author Aleksei Prokopov <a.prokopov@edss.ee>
 */
class TestController extends Controller
{

    public function actions()
    {
        return array(
            'test'   => 'application.components.action.test',
            'delete' => 'application.components.action.delete'
        );
    }

    /**
     * @return array action filters
     */
    public function filters()
    {

        return array(
            'accessControl', // perform access control for CRUD operations
                //'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {

        $this->render();
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('create', 'update'),
//                'users' => array('@'),
//            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array('admin', 'delete'),
//                'users' => array('admin'),
//            ),
//            array('deny', // deny all users
//                'users' => array('*'),
//            ),
        );
    }

}