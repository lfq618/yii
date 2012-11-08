<?php

/**
 * Description of testAction
 *
 * @author Aleksei Prokopov <a.prokopov@edss.ee>
 */
class test extends CAction
{

    public function run()
    {
        $controller = $this->getController();
        CVarDumper::dump($controller);
    }

}