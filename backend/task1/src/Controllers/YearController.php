<?php

namespace App\Controllers;

use App\Exceptions\InputErrorException;
use App\Services\YearService;
use JetBrains\PhpStorm\Pure;

/**
 * Class YearController
 * @package App\Controllers
 */
class YearController
{
    /**
     * @var YearService
     */
    private YearService $yearService;

    /**
     * YearController constructor.
     */
    #[Pure] public function __construct()
    {
        $this->yearService = new YearService();
    }

    /**
     * Проверяет введенные данные и возвращает ответ в формате JSON
     * @return string
     * @throws InputErrorException
     */
    public function checkForLeap(): string
    {
        return $this->yearService->checkForLeap();
    }
}
