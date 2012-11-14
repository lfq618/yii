<?php

/**
 * Description of HelloWorldCommand
 *
 * @author Aleksei Prokopov <a.prokopov@edss.ee>
 */
class WebMigrateCommand extends CConsoleCommand
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
		$runner = new CConsoleCommandRunner();
		$runner->commands = array(
			'migrate' => array(
				'class' => 'system.cli.commands.MigrateCommand',
				'interactive' => false,
			),
		);

		ob_start();
		$args = array_merge(array(
			'yiic',
			'migrate',
		), $args);
		
		$runner->run($args);
		echo htmlentities(ob_get_clean(), null, Yii::app()->charset);
	}

}