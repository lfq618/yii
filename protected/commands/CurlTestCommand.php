<?php
/**
 * Description of CurlCommand
 *
 * @author Aleksei Prokopov <a.prokopov@edss.ee>
 */
class CurlCommand extends CConsoleCommand
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
		echo 'test';
		//echo Yii::app()->curl->get($args[0], $args[1]);
		
	}

}