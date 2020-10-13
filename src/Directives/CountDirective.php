<?php


namespace EasyBlade\Directives;


class CountDirective implements Directive
{

    public static function handle($parameter)
    {
        $array = explode(',', $parameter);
        [$collection, $count] = $array;
        $count = $count ?: 1;
        return "<?php if($collection->count() >= $count): ?>";
    }
}