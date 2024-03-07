<?php

namespace Unetway\PhpHelpers;


class Session
{

    /**
     * Получает значение из сессии.
     * @param string $key Ключ для получения значения.
     * @return mixed|null
     */
    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    /**
     * Устанавливает значение в сессии.
     * @param string $key Ключ для установки значения.
     * @param mixed $value Значение для установки.
     * @return mixed
     */
    public static function put($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    /**
     * Удаляет ключи из сессии.
     * @param array|string $keys Ключи для удаления.
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
     * Увеличивает значение ключа в сессии.
     * @param string $key Ключ для увеличения.
     * @param bool $prefix Увеличивать ли значение с префиксом.
     * @return int
     */
    public static function increment(string $key, bool $prefix = false): int
    {
        return $prefix ? ++$_SESSION[$key] : $_SESSION[$key]++;
    }

    /**
     * Уменьшает значение ключа в сессии.
     * @param string $key Ключ для уменьшения.
     * @param bool $prefix Уменьшать ли значение с префиксом.
     * @return int
     */
    public static function decrement(string $key, $prefix = false): int
    {
        return $prefix ? --$_SESSION[$key] : $_SESSION[$key]--;
    }

}