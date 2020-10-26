<?php


namespace EasyBlade\Directives;


class StyleDirective implements Directive
{

    public static function handle($parameter)
    {
        return "<link href='{$parameter}' rel='stylesheet'>";
    }
}