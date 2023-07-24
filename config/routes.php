<?php

use Router\Router;

$router = new Router();

//Import all your route files or write them here directly.
require __DIR__ . '/routes/mine.php';
require __DIR__ . '/routes/yours.php';

$router->configure();