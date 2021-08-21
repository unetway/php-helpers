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
        $content = date('Y-m-d H:i:s', time()) . "\t" . print_r($data, true) . "\n";

        $file = file_put_contents($path, $content, FILE_APPEND);
        return $file === true;
    }

}
