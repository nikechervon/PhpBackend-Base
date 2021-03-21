<?php

namespace App\Constants;

/**
 * Class ResponseConstants
 * @package App\Constants
 */
final class ResponseConstants
{
    // Код ответа, если поле для ввода года пусто
    const INPUT_ERROR_RESPONSE_CODE = 1001;

    // Код ответа, если год - високосный
    const LEAP_YEAR_RESPONSE_CODE = 1002;

    // Код ответа, если год - невисокосный
    const NOT_LEAP_YEAR_RESPONSE_CODE = 1003;
}
