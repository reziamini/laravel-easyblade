<?php


namespace EasyBlade\Directives;


class ScriptDirective implements Directive
{

    public static function handle($parameter)
    {
        $parameter = str_replace(['"', "'"], null, $parameter);
        return "<script src='{$parameter}' defer></script>";
    }
}