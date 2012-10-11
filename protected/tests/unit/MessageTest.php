<?php
Yii::import('application.controllers.MessageController');

class MessageTest extends CTestCase
{
    public function testActionHelloWorld()
    {
        $message = new MessageController('messageTest');
        $yell = "Hello, Any One Out There?";
        $returnedMessage = $message->repeat($yell);
        $this->assertEquals($returnedMessage, $yell);
    }
}
