<?php


define("CONTROLLERS_NAMESPACE", "App\\Controllers\\");

//The class and its method that handles the case of a non existing uri. 
define("PAGE_NOT_FOUND", "_404");
define("PAGE_NOT_FOUND_ACTION", "index");

//In production you set it to false
define('DEBUG_MODE', true);
//The relative path to the errors' log from the root directory
define('ERRORS_LOG',  '/logs/errors.txt');