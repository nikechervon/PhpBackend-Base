<?php

namespace App\Exceptions;

use App\Constants\ResponseConstants;
use App\JsonResponse;
use App\Renderable;

/**
 * Class HipstersInputEmptyException
 * @package App\Exceptions
 */
class SmoothiesInputErrorException extends \ErrorException implements Renderable
{
    /**
     * @return string
     */
    public function render(): string
    {
        return JsonResponse::render(
            ResponseConstants::SMOOTHIES_INPUT_ERROR_RESPONSE_CODE
        );
    }
}
