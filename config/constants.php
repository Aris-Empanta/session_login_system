<?php


define("CONTROLLERS_NAMESPACE", "App\\Controllers\\");

//The namespace of error handling controllers
define("ERROR_CONTROLLERS_NAMESPACE", "App\\Controllers\\Errors\\");

//The class and its method that handles the case of a non existing uri. 
define("PAGE_NOT_FOUND", "_404");
define("PAGE_NOT_FOUND_ACTION", "index");

//In production you set it to false
define('DEBUG_MODE', true);

//The error NAMESPACE, controller and action
define("ERROR_CONTROLLER_NAMESPACE", "App\\Controllers\\Errors\\Error");
define("ERROR_CONTROLLER", "Error");
define("ERROR_CONTROLLER_ACTION", "index");

//The relative path to the errors' log from the root directory
define('ERRORS_LOG',  '/logs/errors.log');