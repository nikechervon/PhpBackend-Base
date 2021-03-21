<?php

namespace App\Exceptions;

use App\Constants\ResponseConstants;
use App\JsonResponse;
use App\Renderable;

/**
 * Class PrefixErrorException
 * @package App\Exceptions
 */
class PrefixErrorException extends \ErrorException implements Renderable
{
    /**
     * Возвращает ответ как JSON
     * @return string
     */
    public function render(): string
    {
        return JsonResponse::render(
            ResponseConstants::PREFIX_INPUT_ERROR_RESPONSE_CODE
        );
    }
}