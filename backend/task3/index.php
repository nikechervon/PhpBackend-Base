<?php

// Composer autoload
require __DIR__ . '/vendor/autoload.php';

use App\Application;
use Buki\Router\Router;

// Параметры роутинга
$params = [
    'paths' => [
        'controllers' => 'src/Controllers/'
    ],
    'namespaces' => [
        'controllers' => 'App\\Controllers\\'
    ],
];

$router = new Router($params);

// Роуты
require __DIR__ . '/src/Routes/api.php';

// Запуск приложения
$application = new Application($router);
$application->run();
