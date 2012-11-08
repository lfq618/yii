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
        echo "Hello Console!";
    }

}