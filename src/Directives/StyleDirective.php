<?php


namespace EasyBlade\Directives;


class StyleDirective implements Directive
{

    public static function handle($parameter)
    {
        $parameter = str_replace(['"', "'"], null, $parameter);
        $url = asset($parameter);
        return "<link href='{$url}' rel='stylesheet'>";
    }
}