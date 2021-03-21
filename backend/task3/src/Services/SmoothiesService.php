<?php

namespace App\Services;

use App\Constants\ResponseConstants;
use App\Exceptions\HipstersInputEmptyException;
use App\Exceptions\HipstersInputErrorException;
use App\Exceptions\SmoothiesInputEmptyException;
use App\Exceptions\SmoothiesInputErrorException;
use App\JsonResponse;

/**
 * Class SmoothiesService
 * @package App\Services
 */
class SmoothiesService
{
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
        // Инициализация переменных
        $hipstersCount = (int) htmlspecialchars($_POST['hipstersCount']);
        $smoothiesCount = (int) htmlspecialchars($_POST['smoothiesCount']);

        // Валидация
        $this->validation($hipstersCount, $smoothiesCount);

        // Кол-во смузи для одного хипстера
        $smoothiesCountForHipster = floor($smoothiesCount / $hipstersCount);

        // Возвращает ответ
        return JsonResponse::render(
            ResponseConstants::SUCCESS_RESPONSE_CODE,
            $smoothiesCountForHipster
        );
    }

    /**
     * Выполняет валидацию полей
     * @param int $hipstersCount
     * @param int $smoothiesCount
     * @throws HipstersInputEmptyException
     * @throws HipstersInputErrorException
     * @throws SmoothiesInputEmptyException
     * @throws SmoothiesInputErrorException
     * @return void
     */
    private function validation(int $hipstersCount, int $smoothiesCount): void
    {
        // Если не указано кол-во хипстеров
        if (empty($hipstersCount)) {
            throw new HipstersInputEmptyException();
        }

        // Если указаны недопустимые символы в поле хипстеров
        if ($this->checkStringForForbiddenCharacters($hipstersCount)) {
            throw new HipstersInputErrorException();
        }

        // Если не указано кол-во смузи
        if (empty($smoothiesCount)) {
            throw new SmoothiesInputEmptyException();
        }

        // Если указаны недопустимые символы в поле смузи
        if ($this->checkStringForForbiddenCharacters($smoothiesCount)) {
            throw new SmoothiesInputErrorException();
        }
    }

    /**
     * Проверяет строку на запрещенные символы
     * @param string $string
     * @return bool
     */
    private function checkStringForForbiddenCharacters(string $string): bool
    {
        return preg_match("/[\D]/", $string);
    }
}
