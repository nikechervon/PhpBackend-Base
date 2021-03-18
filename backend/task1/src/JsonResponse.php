<?php

namespace App;

/**
 * Class JsonResponse
 * @package App
 */
class JsonResponse
{
    /**
     * Render json
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