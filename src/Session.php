<?php

namespace Unetway\PhpHelpers;


class Session
{

    /**
     * @param $key
     * @return mixed|null
     */
    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
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
     * @param string $key
     * @param bool $prefix
     * @return int
     */
    public static function increment(string $key, bool $prefix = false): int
    {
        return $prefix ? ++$_SESSION[$key] : $_SESSION[$key]++;
    }

    /**
     * @param string $key
     * @param false $prefix
     * @return int
     */
    public static function decrement(string $key, $prefix = false): int
    {
        return $prefix ? --$_SESSION[$key] : $_SESSION[$key]--;
    }

}