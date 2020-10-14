<?php


namespace EasyBlade\Directives;


class UserDirective implements Directive
{

    public static function handle($parameter)
    {
        return "<?php echo \auth()->user()->$parameter; ?>";
    }
}