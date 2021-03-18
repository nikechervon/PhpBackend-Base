<?php

// Require composer autoload
require __DIR__ . '/vendor/autoload.php';

use App\Application;
use Buki\Router\Router;

// Routing params
$params = [
    'paths' => [
        'controllers' => 'src/Controllers/'
    ],
    'namespaces' => [
        'controllers' => 'App\\Controllers\\'
    ],
];

$router = new Router($params);

// Routes
require __DIR__ . '/src/Routes/api.php';

// Run Application
$application = new Application($router);
$application->run();
