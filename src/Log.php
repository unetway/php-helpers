<?php

namespace Unetway\PhpHelpers;


class Log
{
    /**
     * Сохраняет данные в файл лога.
     * @param mixed $data Данные для сохранения.
     * @param string $path Путь к файлу лога.
     * @return bool Возвращает true при успешном сохранении, false в противном случае.
     */
    public static function save($data, string $path): bool
    {
        $dir = dirname($path);

        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $content = date('Y-m-d H:i:s') . "\t" . json_encode($data) . "\n";

        $file = file_put_contents($path, $content, FILE_APPEND | LOCK_EX);

        return $file !== false;
    }

}
