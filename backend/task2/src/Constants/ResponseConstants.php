<?php

namespace App\Constants;

/**
 * Class ResponseConstants
 * @package App\Constants
 */
final class ResponseConstants
{
    // Код ответа, если поле префикса пусто
    const PREFIX_INPUT_ERROR_RESPONSE_CODE = 1001;

    // Код ответа, если поле для слов пусто
    const WORDS_INPUT_ERROR_RESPONSE_CODE = 1002;

    // Код ответа, если все поля заполнены
    const SUCCESS_RESPONSE_CODE = 1003;
}
