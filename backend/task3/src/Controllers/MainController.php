<?php

namespace App\Controllers;

use App\Constants\ResponseConstants;
use App\JsonResponse;

/**
 * Class MainController
 * @package App\Controllers
 */
class MainController
{
    /**
     * Возвращает строку ответа с кол-вом смузи, которые выпил каждый хипстер,
     * в формате JSON.
     * @return string
     */
    public function getSmoothiesCountForHipsters(): string
    {
        $hipstersCount = htmlspecialchars($_POST['hipstersCount']);
        $smoothiesCount = htmlspecialchars($_POST['smoothiesCount']);

        if (empty($hipstersCount)) {
            return JsonResponse::render(
                ResponseConstants::HIPSTERS_INPUT_EMPTY_RESPONSE_CODE
            );
        }

        if ($this->checkStringForForbiddenCharacters($hipstersCount)) {
            return JsonResponse::render(
                ResponseConstants::HIPSTERS_INPUT_ERROR_RESPONSE_CODE
            );
        }

        if (empty($smoothiesCount)) {
            return JsonResponse::render(
                ResponseConstants::SMOOTHIES_INPUT_EMPTY_RESPONSE_CODE
            );
        }

        if ($this->checkStringForForbiddenCharacters($smoothiesCount)) {
            return JsonResponse::render(
                ResponseConstants::SMOOTHIES_INPUT_ERROR_RESPONSE_CODE
            );
        }

        // Кол-во смузи для одного хипстера
        $smoothiesCountForHipster = floor($smoothiesCount / $hipstersCount);

        return JsonResponse::render(
            ResponseConstants::SUCCESS_RESPONSE_CODE,
            $smoothiesCountForHipster
        );
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