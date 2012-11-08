<?php

/**
 * Description of GridController
 *
 * @author Aleksei Prokopov <a.prokopov@edss.ee>
 */
class GridController extends Controller
{

    /**
     * @return array action filters
     */
    public function filters()
    {

        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
            'ajaxOnly + delete',
        );
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new User;
        $model->findAll();
        if (Request::isAjaxRequest() && Request::checkPost('ajax', 'yw0'))
        {
            echo json_encode(array('model' =>
                array(
                    array('id'   => '1', 'name' => 'test'),
                    array('id'   => '2', 'name' => 'test')
                )
            ));
        }
        else
        {
            $this->render('index',
                          array(
                'model' => $model,
            ));
        }
    }

    public function actionTest()
    {
        $list        = new CList();
        $list->add('python');
        $list->add('php');
        $list->add('java');
        if ($list->contains('php')) $list->remove('java');
        $anotherList = new CList(array('python', 'ruby'));
        $list->mergeWith($anotherList);
        $list->setReadOnly(true);
        // print_r($list->toArray());
        // var_dump(getParam('r'));
        dump(Issue::model(3)->attributes, 10);
    }

    public function actionDelete($id)
    {

        User::model()->findByPk($id)->delete();
        return true;
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