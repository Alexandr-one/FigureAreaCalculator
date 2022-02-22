<?php

namespace App\Classes;

class Enum
{
    public static function lists()
    {
        return (new \ReflectionClass(get_called_class()))->getConstants();
    }
}
