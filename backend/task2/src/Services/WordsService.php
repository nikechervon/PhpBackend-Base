<?php

namespace App\Services;

use App\Exceptions\PrefixErrorException;
use App\Exceptions\WordsErrorException;

/**
 * Class WordsService
 * @package App\Services
 */
class WordsService
{
    /**
     * Выполняет валидацию полей
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