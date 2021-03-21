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
     * Запуск приложения
     * @return void
     */
    public function run(): void
    {
        try {
            $this->router->run();

        } catch (\ErrorException $exception) {
            echo $this->renderException($exception);
        }
    }

    /**
     * Возвращает исключение
     * @param \Exception $exception
     * @return mixed
     */
    private function renderException(\Exception $exception): mixed
    {
        if ($exception instanceof Renderable) {
            return $exception->render();
        }

        return $exception->getMessage();
    }
}
