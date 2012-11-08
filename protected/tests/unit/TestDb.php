<?php

class DBTest extends CTestCase
{

    public function testActionConnect()
    {
        $this->assertNotEquals(NULL, Yii::app()->db);
    }

}
