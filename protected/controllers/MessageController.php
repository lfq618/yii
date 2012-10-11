<?php
class MessageController extends Controller
{
	public function actionIndex()
	{
		$this->render('index', array('test' => 'test'));
	}

	public function actionHelloWorld()
	{
		$this->render('helloWorld');
	}

	public function actionGoodbye()
	{
		$this->render('goodbye');
	}

	public function repeat($inputString)
	{
		return $inputString;
	}

	public function actionTestProject()
	{
		$project = new Project;
		$project->setAttributes(array(
			'name' => 'NewProjectName',
			'description'=> 'New Project Description',
			'create_user_id' => 1,
			'update_user_id' => 1
		));
		$project->save(false);
		var_dump($project->id);
	}
}