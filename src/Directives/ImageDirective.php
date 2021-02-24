<?php

namespace EasyBlade\Directives;

use EasyBlade\Contract\Directivable;

class ImageDirective implements Directivable
{
    public static function handle($parameter)
    {
        $parameter = str_replace(['"', "'"], null, $parameter);
        $array = explode(',', $parameter);
        $photo = trim($array[0]);
        $class = trim(@$array[1]) ?? null;

        return "<img src='".asset($photo)."' class='$class'>";
    }

}