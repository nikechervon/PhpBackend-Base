<?php

namespace App\Exceptions;

use App\Constants\ResponseConstants;
use App\JsonResponse;
use App\Renderable;

/**
 * Class PrefixInputErrorException
 * @package App\Exceptions
 */
class WordsInputErrorException extends \ErrorException implements Renderable
{
    /**
     * Возвращает ответ как JSON
     * @return string
     */
    public function render(): string
    {
        return JsonResponse::render(
            ResponseConstants::WORDS_INPUT_ERROR_RESPONSE_CODE
        );
    }
}