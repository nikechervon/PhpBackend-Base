<?php

namespace App\Exceptions;

use App\Constants\ResponseConstants;
use App\JsonResponse;
use App\Renderable;

/**
 * Class InputErrorException
 * @package App\Exceptions
 */
class InputErrorException extends \ErrorException implements Renderable
{
    /**
     * Возвращает ответ как JSON
     * @return string
     */
    public function render(): string
    {
        return JsonResponse::render(
            ResponseConstants::INPUT_ERROR_RESPONSE_CODE
        );
    }
}
