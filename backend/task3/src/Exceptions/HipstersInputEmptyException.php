<?php

namespace App\Exceptions;

use App\Constants\ResponseConstants;
use App\JsonResponse;
use App\Renderable;

/**
 * Class HipstersInputEmptyException
 * @package App\Exceptions
 */
class HipstersInputEmptyException extends \ErrorException implements Renderable
{
    /**
     * @return string
     */
    public function render(): string
    {
        return JsonResponse::render(
            ResponseConstants::HIPSTERS_INPUT_EMPTY_RESPONSE_CODE
        );
    }
}
