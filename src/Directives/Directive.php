<?php

namespace EasyBlade\Directives;

interface Directive
{
    public static function handle($parameter);
}