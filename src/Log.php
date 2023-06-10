<?php

namespace Unetway\PhpHelpers;


class Log
{
    /**
     * @param $data
     * @param null $path
     * @return bool
     */
    public static function save($data, $path): bool
    {
        $content = date('Y-m-d H:i:s') . "\t" . print_r($data, true) . "\n";

        $file = file_put_contents($path, $content, FILE_APPEND | LOCK_EX);
        return $file !== false;
    }

}
