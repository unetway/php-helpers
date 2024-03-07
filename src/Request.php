<?php

namespace Unetway\PhpHelpers;

class Request
{
    /**
     * Получает значение из $_GET.
     * @param string $key Ключ для получения значения.
     * @return mixed
     */
    public static function get(string $key)
    {
        return filter_input(INPUT_GET, $key, FILTER_SANITIZE_STRING) ?? null;
    }

    /**
     * Получает тело запроса.
     * @return mixed
     */
    public static function getBody()
    {
        $request = file_get_contents('php://input');
        return json_decode($request, true);
    }

    /**
     * Кодирует массив в JSON.
     * @param array $params Массив для кодирования.
     * @return false|string
     */
    public static function json(array $params): string
    {
        return json_encode($params, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Перенаправляет пользователя на указанный URL.
     * @param string $url URL для перенаправления.
     */
    public static function location(string $url): void
    {
        header('Location: ' . $url);
    }

    /**
     * Ограничивает количество запросов за определенный период времени.
     * @param int $limit_request Лимит запросов.
     * @param int $time_request Время в секундах.
     * @return bool
     */
    public static function throttle(int $limit_request = 1, int $time_request = 10): bool
    {
        $timeRequest = Session::get('time_request');
        $limitRequest = Session::get('limit_request');

        if (empty($timeRequest) || $timeRequest + $time_request < time()) {
            Session::put('time_request', time());
            Session::put('limit_request', 1);
        } elseif ($timeRequest + $time_request >= time()) {
            Session::increment('limit_request');

            if ($limitRequest > $limit_request) {
                return true;
            }
        }

        return false;
    }
}
