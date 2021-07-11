<?php

use Illuminate\Support\Str;

class Slug
{
    public static function generate($str)
    {
        return str_replace(' ', '-', strtolower($str)) . '-' . Str::uuid();
    }
}