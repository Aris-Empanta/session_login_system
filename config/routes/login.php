<?php

//We need to put the middleware functions (array) as a property to all the routes of the group
//or a single route. first, create an array named middleware.

$router->get('', 'Login', 'view');