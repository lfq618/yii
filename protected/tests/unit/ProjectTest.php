<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProjectTest
 *
 * @author User
 */
class ProjectTest extends CTestCase
{

    public $fixtures = array(
        'projects' => 'Project',
    );

    public function testCRUD()
    {
        //Create a new project
        $newProject     = new Project;
        $newProjectName = 'Test Project 1';
        $newProject->setAttributes(
                array(
                    'name'           => $newProjectName,
                    'description'    => 'Test project number one',
                    'create_time'    => '2010-01-01 00:00:00', 'create_user_id' => 1,
                    'update_time'    => '2010-01-01 00:00:00',
                    'update_user_id' => 1,
                )
        );
        $this->assertTrue($newProject->save(false));

        //READ back the newly created project
//        $retrievedProject = Project::model()->findByPk($newProject->id);
//        $this->assertTrue($retrievedProject instanceof Project);
//        $this->assertEquals($newProjectName, $retrievedProject->name);
    }

    public function testRead()
    {
//        $retrievedProject = $this->projects('project1');
//        $this->assertTrue($retrievedProject instanceof Project);
//        $this->assertEquals('Test Project 1', $retrievedProject->name);
    }

}

?>
