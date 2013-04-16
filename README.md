# Magento Whoops Exceptions module

Handle all Magento Exceptions throught the wonderful [Whoops](https://github.com/filp/whoops) tool by [filp](http://ssh.pt)

![WhoopsMagento](http://static.nls.io/magento-whoops.jpg)

## Usage

1\. Install the module

2\. Activate developper mode in /index.php

    Mage::setIsDeveloperMode(true); 

3\. Include Whoops startup

    if(Mage::getIsDeveloperMode()) {
        require_once(MAGENTO_ROOT.'/app/code/community/Nls/Whoops/Whoops.php');
    }

4\. Copy /app/code/core/Mage/Core/Model/App.php to /app/code/local/Mage/Core/Model/App.php **(Yeah, I know that's really bad but it's the only way to avoid error handlers to be set by Magento)**

5\. Modify /app/code/local/Mage/Core/Model/App.php

    public function setErrorHandler($handler)
    {
        set_error_handler($handler); 
        return $this;
    }

to :

    public function setErrorHandler($handler)
    {
        if(!Mage::getIsDeveloperMode()) {
            set_error_handler($handler); 
            return $this;
        }
    }

6\. You're done. Have fun.
    
## Requirements

* Magento (any versions)
* PHP 5 (seems obvious)
