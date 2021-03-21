<?php

namespace App\Controllers;

use App\Renderable;

/**
 * Class BaseController
 * @package App\Controllers
 */
class BaseController
{
    /**
     * Возвращает исключение
     * @param \Exception $exception
     * @return mixed
     */
    protected function renderException(\Exception $exception): mixed
    {
        if ($exception instanceof Renderable) {
            return $exception->render();
        }

        return $exception->getMessage();
    }
}