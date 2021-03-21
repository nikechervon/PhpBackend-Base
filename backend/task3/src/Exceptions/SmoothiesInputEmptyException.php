<?php

namespace App\Exceptions;

use App\Constants\ResponseConstants;
use App\JsonResponse;
use App\Renderable;

/**
 * Class HipstersInputEmptyException
 * @package App\Exceptions
 */
class SmoothiesInputEmptyException extends \ErrorException implements Renderable
{
    /**
     * @return string
     */
    public function render(): string
    {
        return JsonResponse::render(
            ResponseConstants::SMOOTHIES_INPUT_EMPTY_RESPONSE_CODE
        );
    }
}