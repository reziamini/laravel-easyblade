<?php


namespace EasyBlade\Directives;


class UserDirective implements Directive
{

    public static function handle($parameter)
    {
        $parameter = str_replace(['"', "'"], null, $parameter);
        return "<?php echo \auth()->user()->$parameter; ?>";
    }
}