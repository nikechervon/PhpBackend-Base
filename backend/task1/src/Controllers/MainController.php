<?php

namespace App\Controllers;

use App\Constants\ResponseConstants;
use JetBrains\PhpStorm\Pure;
use App\JsonResponse;

/**
 * Class MainController
 * @package App\Controllers
 */
class MainController
{
    /**
     * Validates input and returns message codes as JSON
     * @return string
     */
    public function validationYear(): string
    {
        $year = htmlspecialchars($_POST['year']);

        // Checking for a numeric string
        if (preg_match("/[\D]/", $year) || empty($year)) {
            return JsonResponse::render(
                ResponseConstants::INPUT_ERROR_RESPONSE_CODE
            );
        }

        // Checks if there is a leap year
        if (!self::isLeapYear((int)$year)) {
            return JsonResponse::render(
                ResponseConstants::NOT_LEAP_YEAR_RESPONSE_CODE
            );
        }

        return JsonResponse::render(
            ResponseConstants::LEAP_YEAR_RESPONSE_CODE
        );
    }

    #[Pure]
    /**
     * Checks if there is a leap year
     * @param int $year
     * @return bool
     */
    private function isLeapYear(int $year): bool
    {
        return (bool)date("L", mktime(0, 0, 0, 7, 7, $year));
    }
}