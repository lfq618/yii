<?php

/**
 * Description of UpdateController
 *
 * @author Aleksei Prokopov <a.prokopov@edss.ee>
 */
class UpdateController extends Controller
{

    private $_authManager;

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
        If (Yii::app()->user->checkAccess('createIssue'))
        {
            echo 'has access';
            //perform needed logic
        }
        else echo 'don\'t have access';
        // $auth=Yii::app()->authManager;
        // $auth->assign('member',1);
//     $applicationCommandPath = Yii::app()->getBasePath().DIRECTORY_SEPARATOR.'commands';
//		if(Yii::app()->_commandPath===null && file_exists($applicationCommandPath))
//			Yii::app()->setCommandPath($applicationCommandPath);
//	echo $applicationCommandPath;
    }

    public function actionUpdate()
    {
        if (($this->_authManager = Yii::app()->authManager) === null)
        {
            echo "Error: an authorization manager, named 'authManager' must be configured to use this command.\n";
            echo "If you already added 'authManager' component in application configuration,\n";
            echo "please quit and re-enter the yiic shell.\n";
            return;
        }
        //provide the oportunity for the use to abort the request
        echo "This command will create three roles: Owner, Member, and Reader and the following premissions:\n";
        echo "create, read, update and delete user\n";
        echo "create, read, update and delete project\n";
        echo "create, read, update and delete issue\n";
        //    echo "Would you like to continue? [Yes|No] ";
//check the input from the user and continue if they indicated yes to the above question
        // if (!strncasecmp(trim(fgets(STDIN)), 'y', 1))
        //  {
//first we need to remove all operations, roles, child relationship and assignments
        $this->_authManager->clearAll();
//create the lowest level operations for users
        $this->_authManager->createOperation("createUser", "create a new user");
        $this->_authManager->createOperation("readUser",
                                             "read user profile information");
        $this->_authManager->createOperation("updateUser",
                                             "update a users information");
        $this->_authManager->createOperation("deleteUser",
                                             "remove a user from a project");
//create the lowest level operations for projects
        $this->_authManager->createOperation("createProject",
                                             "create a new project");
        $this->_authManager->createOperation("readProject",
                                             "readproject information");
        $this->_authManager->createOperation("updateProject",
                                             "update project information");
        $this->_authManager->createOperation("deleteProject", "delete a project");
//create the lowest level operations for issues

        $this->_authManager->createOperation("createIssue", "create a new issue");
        $this->_authManager->createOperation("readIssue",
                                             "read issue information");
        $this->_authManager->createOperation("updateIssue",
                                             "update issue information");
        $this->_authManager->createOperation("deleteIssue",
                                             "delete an issue from a project");
//create the reader role and add the appropriate permissions as children to this role
        $role = $this->_authManager->createRole("reader");
        $role->addChild("readUser");
        $role->addChild("readProject");
        $role->addChild("readIssue");
//create the member role, and add the appropriate permissions, as well
        //as the reader role itself, as children
        $role = $this->_authManager->createRole("member");
        $role->addChild("reader");
        $role->addChild("createIssue");
        $role->addChild("updateIssue");
        $role->addChild("deleteIssue");
//create the owner role, and add the appropriate permissions, as well
        //as both the reader and member roles as children
        $role = $this->_authManager->createRole("owner");
        $role->addChild("reader");
        $role->addChild("member");
        $role->addChild("createUser");
        $role->addChild("updateUser");
        $role->addChild("deleteUser");
        $role->addChild("createProject");
        $role->addChild("updateProject");
        $role->addChild("deleteProject");
//provide a message indicating success
        echo "Authorization hierarchy successfully generated.";
        //$this->render();
        // }
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