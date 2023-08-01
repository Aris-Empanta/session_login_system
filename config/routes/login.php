<?php

$router->get('login', 'Login', 'view');
$router->post('login', 'Login', 'validateCredentials');