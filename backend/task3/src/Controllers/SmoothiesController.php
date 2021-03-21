<?php

namespace App\Controllers;

use App\Constants\ResponseConstants;
use App\Exceptions\HipstersInputEmptyException;
use App\Exceptions\HipstersInputErrorException;
use App\Exceptions\SmoothiesInputEmptyException;
use App\Exceptions\SmoothiesInputErrorException;
use App\JsonResponse;
use App\Services\SmoothiesService;
use JetBrains\PhpStorm\Pure;

/**
 * Class SmoothiesController
 * @package App\Controllers
 */
class SmoothiesController
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
     * @throws HipstersInputEmptyException
     * @throws HipstersInputErrorException
     * @throws SmoothiesInputEmptyException
     * @throws SmoothiesInputErrorException
     */
    public function getCountForHipsters(): string
    {
        return $this->smoothiesService->getCountForHipsters();
    }
}
