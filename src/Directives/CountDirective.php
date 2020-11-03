<?php

namespace EasyBlade\Directives;

class CountDirective implements Directive
{
    public static function handle($parameter)
    {
        preg_match('/((\[.*?\])|(\$.*))\s?,\s?(\d+)?/', $parameter, $match);
        $count = $match[4] ?? 1;
        [$collection, $count] = [$match[1], $count];
        return "<?php if(count({$collection}) >= {$count}): ?>";
    }
}