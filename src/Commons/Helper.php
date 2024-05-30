<?php

namespace Hi\PhpOop\Commons;

class Helper
{
    public static function dd($data)
    {
        echo '<pre>';
        print_r($data);
        die();
    }
}
