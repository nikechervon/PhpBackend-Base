<?php

namespace App\Constants;

/**
 * Class ResponseConstants
 * @package App\Constants
 */
final class ResponseConstants
{
    // Код ответа, если поле кол-ва хипстеров пусто
    const HIPSTERS_INPUT_EMPTY_RESPONSE_CODE = 1001;

    // Код ответа, если поле кол-ва смузи пусто
    const SMOOTHIES_INPUT_EMPTY_RESPONSE_CODE = 1002;

    // Код ответа, если поле кол-ва хипстеров содержит недопустимые символы
    const HIPSTERS_INPUT_ERROR_RESPONSE_CODE = 1003;

    // Код ответа, если поле кол-ва смузи содержит недопустимые символы
    const SMOOTHIES_INPUT_ERROR_RESPONSE_CODE = 1004;

    // Код ответа, если поле кол-ва смузи содержит недопустимые символы
    const SUCCESS_RESPONSE_CODE = 1005;
}
