<?php

namespace EasyBlade\Directives;

class StyleDirective implements Directive
{
    public static function handle($parameter)
    {
        $parameter = str_replace(['"', "'"], null, $parameter);
        $array = explode(',', $parameter);
        $secure = trim(@$array[1]) ?? null;
        $url = asset(trim($array[0]), $secure);

        return "<link href='{$url}' rel='stylesheet'>";
    }
}