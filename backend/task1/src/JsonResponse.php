<?php

namespace App;

/**
 * Class JsonResponse
 * @package App
 */
class JsonResponse
{
    /**
     * Возвращает данные в формате JSON
     * @param $data
     * @param int $status
     * @return string
     */
    public static function render($data, $status = 200): string
    {
        return json_encode([
            'status' => $status,
            'result' => $data
        ]);
    }
}
