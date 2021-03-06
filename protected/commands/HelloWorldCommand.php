<?php

/**
 * Description of HelloWorldCommand
 *
 * @author Aleksei Prokopov <a.prokopov@edss.ee>
 */
class HelloWorldCommand extends CConsoleCommand
{
    public function getHelp()
    {
        return "Command help";
    }

    /**
     * Execute the action.
     * @param array command line parameters specific for this command
     */
    public function run($args)
    {
		//var_dump($args);
		$runner = new CConsoleCommandRunner();
		$runner->commands = array(
			'migrate' => array(
				'class' => 'system.cli.commands.MigrateCommand',
				'interactive' => false,
			),
		);

		ob_start();
		$runner->run($args);
		echo htmlentities(ob_get_clean(), null, Yii::app()->charset);
       // echo "Hello Console!";
    }

}