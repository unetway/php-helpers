<?php

namespace Unetway\PhpHelpers;


class Request
{

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        return $_GET[$key] ?? null;
    }

    /**
     * @return mixed
     */
    public static function getBody()
    {
        $request = file_get_contents('php://input');
        return json_decode($request, true);
    }

    /**
     * @param array $params
     * @return false|string
     */
    public static function json(array $params)
    {
        return json_encode($params, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $url
     */
    public static function location($url)
    {
        header('Location: ' . $url);
    }

    /**
     * @param int $limit_request
     * @param int $time_request
     * @return bool
     */
    public static function throttle(int $limit_request = 1, int $time_request = 10): bool
    {
        if (empty(Session::get('time_request')) or Session::get('time_request') + $time_request < time()) {
            Session::put('time_request', time());
            Session::put('limit_request', 1);
        } else if (Session::get('time_request') + $time_request >= time()) {
            Session::increment('limit_request');

            if (Session::get('limit_request') > $limit_request) {
                return true;
            }
        }

        return false;
    }

}
