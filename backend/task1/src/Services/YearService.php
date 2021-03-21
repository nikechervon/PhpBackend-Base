<?php

namespace App\Services;

use App\Constants\ResponseConstants;
use App\Exceptions\InputErrorException;
use App\JsonResponse;
use JetBrains\PhpStorm\Pure;

/**
 * Class YearService
 * @package App\Services
 */
class YearService
{
    /**
     * Проверяет введенные данные и возвращает ответ в формате JSON
     * @return string
     * @throws InputErrorException
     */
    public function checkForLeap(): string
    {
        // Введенный год
        $year = htmlspecialchars($_POST['year']);

        // Валидация
        $this->validation($year);

        // Если год невисокосный
        if (!$this->isLeap((int)$year)) {

            // Возвращает ответ (год невисокосный)
            return JsonResponse::render(
                ResponseConstants::NOT_LEAP_YEAR_RESPONSE_CODE
            );
        }

        // Возвращает ответ (год високосный)
        return JsonResponse::render(
            ResponseConstants::LEAP_YEAR_RESPONSE_CODE
        );
    }

    /**
     * Выполняет проверку введенного года
     * @param $year
     * @throws InputErrorException
     * @return void
     */
    public function validation($year): void
    {
        // Проверка, что строка состоит только из цифр
        if (preg_match("/[\D]/", $year) || empty($year)) {
            throw new InputErrorException();
        }
    }

    /**
     * Проверка на високосный год
     * @param int $year
     * @return bool
     */
    #[Pure] public function isLeap(int $year): bool
    {
        return (bool)date(
            "L", mktime(0, 0, 0, 7, 7, $year)
        );
    }
}
