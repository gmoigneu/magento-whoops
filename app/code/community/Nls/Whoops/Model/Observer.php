<?php

class Nls_Whoops_Model_Observer {

    /**
    * Register our new error handler
    */
    public function add_errorhandler($observer)
    {

        if(Mage::getIsDeveloperMode()) {

            // Require all needed classes
            require_once(Mage::getBaseDir().'/app/code/community/Nls/Whoops/lib/Run.php');
            require_once(Mage::getBaseDir().'/app/code/community/Nls/Whoops/lib/Exception/ErrorException.php');
            require_once(Mage::getBaseDir().'/app/code/community/Nls/Whoops/lib/Exception/Inspector.php');
            require_once(Mage::getBaseDir().'/app/code/community/Nls/Whoops/lib/Exception/FrameIterator.php');
            require_once(Mage::getBaseDir().'/app/code/community/Nls/Whoops/lib/Exception/Frame.php');
            require_once(Mage::getBaseDir().'/app/code/community/Nls/Whoops/lib/Handler/HandlerInterface.php');
            require_once(Mage::getBaseDir().'/app/code/community/Nls/Whoops/lib/Handler/Handler.php');
            require_once(Mage::getBaseDir().'/app/code/community/Nls/Whoops/lib/Handler/PrettyPageHandler.php');

            // Remove developperMode default behavior
            ini_set('error_reporting', '-1');
            ini_set('display_errors', 'Off');

            // Instanciate and register our new handler
            $run = new Whoops\Run;
            $handler = new Whoops\Handler\PrettyPageHandler;
            $run->pushHandler($handler);
            $run->register();
        }
    }

}