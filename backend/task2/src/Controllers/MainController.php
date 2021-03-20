<?php

namespace App\Controllers;

use App\Constants\ResponseConstants;
use App\JsonResponse;

/**
 * Class MainController
 * @package App\Controllers
 */
class MainController
{
    /**
     * Ищет и возвращает массив слов, начинающихся с префикса, в формате JSON.
     * @return string
     */
    public function searchWordsByPrefix(): string
    {
        $prefix = htmlspecialchars(trim($_POST['prefix']));

        // Проверка на пустое поле префикса
        if (empty($prefix)) {
            return JsonResponse::render(
                ResponseConstants::PREFIX_INPUT_ERROR_RESPONSE_CODE
            );
        }

        // Проверка на пустое поле для ввода слов
        if (empty($_POST['words'])) {
            return JsonResponse::render(
                ResponseConstants::WORDS_INPUT_ERROR_RESPONSE_CODE
            );
        }

        // Массив слов
        $words = explode(',', $_POST['words']);

        // Массив слов, начинающийся с префикса
        $filteredWords = $this->getWordsByPrefix($prefix, $words);

        return JsonResponse::render(
            ResponseConstants::GET_WORDS_RESPONSE_CODE,
            $filteredWords
        );
    }

    /**
     * Возвращает массив слов, начинающихся с префикса
     * @param string $prefix
     * @param array $words
     * @return array
     */
    private function getWordsByPrefix(string $prefix, array $words): array
    {
        // Callback фильтрации
        $callback = function ($word) use ($prefix) {
            $word = htmlspecialchars(
                trim($word)
            );
            return mb_stripos($word, $prefix) === 0;
        };

        // Массив отфильтрованных слов
        $filteredWords = array_filter($words, $callback);
        return array_values($filteredWords);
    }
}