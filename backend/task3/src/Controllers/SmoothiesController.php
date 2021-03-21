<?php

namespace App\Controllers;

use App\Constants\ResponseConstants;
use App\JsonResponse;
use App\Services\SmoothiesService;
use JetBrains\PhpStorm\Pure;

/**
 * Class SmoothiesController
 * @package App\Controllers
 */
class SmoothiesController extends BaseController
{
    /**
     * @var SmoothiesService
     */
    private SmoothiesService $smoothiesService;

    /**
     * SmoothiesController constructor.
     */
    #[Pure] public function __construct()
    {
        $this->smoothiesService = new SmoothiesService();
    }

    /**
     * Возвращает ответ с кол-вом смузи, которые выпил каждый хипстер, в формате JSON
     * @return string
     */
    public function getCountForHipsters(): string
    {
        try {
            // Инициализация переменных
            $hipstersCount = (int) htmlspecialchars($_POST['hipstersCount']);
            $smoothiesCount = (int) htmlspecialchars($_POST['smoothiesCount']);

            // Валидация
            $this->smoothiesService->validation($hipstersCount, $smoothiesCount);

            // Кол-во смузи для одного хипстера
            $smoothiesCountForHipster = floor($smoothiesCount / $hipstersCount);

            // Возвращает ответ
            return JsonResponse::render(
                ResponseConstants::SUCCESS_RESPONSE_CODE,
                $smoothiesCountForHipster
            );

        } catch (\ErrorException $exception) {

            // Рендеринг исключения
            return $this->renderException($exception);
        }
    }
}