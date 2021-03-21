<?php

namespace App\Services;

use App\Constants\ResponseConstants;
use App\Exceptions\PrefixErrorException;
use App\Exceptions\WordsErrorException;
use App\JsonResponse;

/**
 * Class WordsService
 * @package App\Services
 */
class WordsService
{
    /**
     * Ищет и возвращает ответ, начинающихся с префикса, в формате JSON.
     * @return string
     * @throws PrefixErrorException
     * @throws WordsErrorException
     */
    public function searchByPrefix(): string
    {
        // Инициализация переменных
        $prefix = htmlspecialchars(trim($_POST['prefix']));
        $words = $_POST['words'];

        // Валидация
        $this->validation($prefix, $words);

        // Массив слов
        $wordsList = explode(',', $words);

        // Массив слов, начинающийся с префикса
        $filteredWords = $this->getByPrefix($prefix, $wordsList);

        // Возвращает ответ
        return JsonResponse::render(
            ResponseConstants::SUCCESS_RESPONSE_CODE,
            $filteredWords
        );
    }

    /**
     * Выполняет валидацию префикса и строку слов
     * @param string $prefix
     * @param string $words
     * @throws PrefixErrorException
     * @throws WordsErrorException
     * @return void
     */
    public function validation(string $prefix, string $words): void
    {
        // Проверка на пустое поле префикса
        if (empty($prefix)) {
            throw new PrefixErrorException();
        }

        // Проверка на пустое поле для ввода слов
        if (empty($words)) {
            throw new WordsErrorException();
        }
    }

    /**
     * Возвращает массив слов, начинающихся с префикса
     * @param string $prefix
     * @param array $words
     * @return array
     */
    public function getByPrefix(string $prefix, array $words): array
    {
        // Callback фильтрации
        $callback = function ($word) use ($prefix) {
            $word = htmlspecialchars(trim($word));
            return mb_stripos($word, $prefix) === 0;
        };

        // Массив отфильтрованных слов
        $filteredWords = array_filter($words, $callback);
        return array_values($filteredWords);
    }
}
