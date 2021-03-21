<?php

namespace App\Controllers;

use App\Exceptions\PrefixErrorException;
use App\Exceptions\WordsErrorException;
use App\Services\WordsService;
use JetBrains\PhpStorm\Pure;

/**
 * Class WordsController
 * @package App\Controllers
 */
class WordsController
{
    /**
     * @var WordsService
     */
    private WordsService $wordsService;

    /**
     * MainController constructor.
     */
    #[Pure] public function __construct()
    {
        $this->wordsService = new WordsService();
    }

    /**
     * Ищет и возвращает ответ, начинающихся с префикса, в формате JSON.
     * @throws PrefixErrorException
     * @throws WordsErrorException
     * @return string
     */
    public function searchByPrefix(): string
    {
        return $this->wordsService->searchByPrefix();
    }
}
