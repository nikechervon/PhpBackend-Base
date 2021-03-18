<?php

namespace App;

use Buki\Router\Router;

/**
 * Class Application
 * @package App
 */
class Application
{
    /**
     * @var Router
     */
    private Router $router;

    /**
     * Application constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Run application
     * @return void
     */
    public function run(): void
    {
        $this->router->run();
    }
}