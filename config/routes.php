<?php

use Router\Router;

$router = new Router();

//Import all middleware functions
require_once __DIR__ . '/middleware/auth.php';

//Import all your route files or write them here directly.
require_once __DIR__ . '/routes/login.php';

$router->configure();