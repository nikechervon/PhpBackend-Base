<?php

namespace App\Services;

use App\Exceptions\InputErrorException;
use App\Exceptions\NotLeapYearException;
use App\Renderable;
use JetBrains\PhpStorm\Pure;

/**
 * Class YearService
 * @package App\Services
 */
class YearService
{
    /**
     * Выполняет валидацию и выдает исключения
     * @param $year
     * @throws InputErrorException
     * @throws NotLeapYearException
     * @return void
     */
    public function validation($year): void
    {
        // Проверка, что строка состоит только из цифр
        if (preg_match("/[\D]/", $year) || empty($year)) {
            throw new InputErrorException();
        }

        // Проверка на високосный год
        if (!$this->isLeap((int) $year)) {
            throw new NotLeapYearException();
        }
    }

    /**
     * Возвращает исключение
     * @param \Exception $exception
     * @return mixed
     */
    public function renderException(\Exception $exception): mixed
    {
        if ($exception instanceof Renderable) {
            return $exception->render();
        }

        return $exception->getMessage();
    }

    #[Pure]
    /**
     * Проверка на високосный год
     * @param int $year
     * @return bool
     */
    public function isLeap(int $year): bool
    {
        return (bool)date(
            "L", mktime(0, 0, 0, 7, 7, $year)
        );
    }
}