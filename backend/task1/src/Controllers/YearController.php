<?php

namespace App\Controllers;

use App\Constants\ResponseConstants;
use App\Renderable;
use App\Services\YearService;
use JetBrains\PhpStorm\Pure;
use App\JsonResponse;

/**
 * Class MainController
 * @package App\Controllers
 */
class YearController
{
    /**
     * @var YearService
     */
    private YearService $yearService;

    #[Pure]
    /**
     * YearController constructor.
     */
    public function __construct()
    {
        $this->yearService = new YearService();
    }

    /**
     * Проверяет введенные данные и возвращает ответ в формате JSON
     * @return string
     */
    public function check(): string
    {
        try {
            // Введенный год
            $year = htmlspecialchars($_POST['year']);

            // Валидация
            $this->yearService->validation($year);

            // Возвращает ответ
            return JsonResponse::render(
                ResponseConstants::LEAP_YEAR_RESPONSE_CODE
            );

        } catch (\ErrorException $exception) {

            // Рендеринг исключения
            return $this->renderException($exception);
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