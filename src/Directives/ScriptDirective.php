<?php


namespace EasyBlade\Directives;


class ScriptDirective implements Directive
{

    public static function handle($parameter)
    {
        $parameter = str_replace(['"', "'"], null, $parameter);
        $url = asset($parameter);
        return "<script src='{$url}' defer></script>";
    }
}