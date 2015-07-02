<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
// Define path to Media directory
defined('MEDIA_PATH')
    || define('MEDIA_PATH',  '../');

// Define path to Data directory
defined('DATA_PATH')
    || define('DATA_PATH',  APPLICATION_PATH.'/configs/data');
	
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

/** Zend_Application */
require_once realpath(APPLICATION_PATH . '/../vendor/autoload.php');

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$mgr_sales_json =json_decode(file_get_contents(DATA_PATH."/manager_sales.json"),true);
Zend_Registry::set('mgr_sales', $mgr_sales_json);
$application->bootstrap()
            ->run();