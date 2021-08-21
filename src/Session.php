<?php

namespace Unetway\PhpHelpers;


class Session
{

    /**
     * @param $key
     * @return mixed
     */
    public static function get($key)
    {
        return $_SESSION[$key];
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public static function put($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    /**
     * @param $keys
     */
    public static function destroy($keys)
    {
        if (is_array($keys)) {
            foreach ($keys as $key) {
                unset($_SESSION[$key]);
            }
        } else {
            unset($_SESSION[$keys]);
        }
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function increment($key, $prefix = false)
    {
        if ($prefix) {
            return ++$_SESSION[$key];
        }

        return $_SESSION[$key]++;
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function decrement($key, $prefix = false)
    {
        if ($prefix) {
            return --$_SESSION[$key];
        }

        return $_SESSION[$key]--;
    }

}