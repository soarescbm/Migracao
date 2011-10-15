<?php

include_once 'Migrador.php';

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__)));


set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/lib'),
    get_include_path(),
)));

require_once 'Zend/Loader/Autoloader.php';
Zend_Loader_Autoloader::getInstance();


$config = new Zend_Config_Ini(APPLICATION_PATH.'/config/config.ini');

$app = new Migrador($config);
$app->run();