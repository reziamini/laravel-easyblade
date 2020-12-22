<?php

namespace EasyBlade\Directives;

class ScriptDirective implements Directive
{
    public static function handle($parameter)
    {
        $parameter = str_replace(['"', "'"], null, $parameter);
        $array = explode(',', $parameter);
        $secure = trim(@$array[1]) ?? null;
        $url = asset(trim($array[0]), $secure);

        $defer = trim(@$array[2]) ?? null;
        if ($defer) {
            return "<script src='{$url}' defer></script>";
        }

        return "<script src='{$url}'></script>";
    }
}