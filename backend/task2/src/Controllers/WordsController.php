<?php

namespace App\Controllers;

use App\Constants\ResponseConstants;
use App\JsonResponse;
use App\Services\WordsService;
use JetBrains\PhpStorm\Pure;

/**
 * Class WordsController
 * @package App\Controllers
 */
class WordsController extends BaseController
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
     * @return string
     */
    public function searchByPrefix(): string
    {
        try {
            // Инициализация переменных
            $prefix = htmlspecialchars(trim($_POST['prefix']));
            $words = $_POST['words'];

            // Валидация
            $this->wordsService->validation($prefix, $words);

            // Массив слов
            $wordsList = explode(',', $words);

            // Массив слов, начинающийся с префикса
            $filteredWords = $this->wordsService->getByPrefix($prefix, $wordsList);

            // Возвращает ответ
            return JsonResponse::render(
                ResponseConstants::SUCCESS_RESPONSE_CODE,
                $filteredWords
            );

        } catch (\ErrorException $exception) {

            // Рендеринг исключения
            return $this->renderException($exception);
        }
    }
}