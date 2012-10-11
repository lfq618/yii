<?php
$this->breadcrumbs = array(
    'Message' => array('message/index'),
    'HelloWorld'
);?>
<h1>Hello, World! <?=$test?></h1>
<p><?=CHtml::link('Goodbye', array('message/goodbye'));?></p>
<p><?=CHtml::link('Anchor'); ?></p>
<p><?=CHtml::link("WithId", '#', array('id' => 'test')); ?></p>