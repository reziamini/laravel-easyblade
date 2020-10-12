<?php


namespace EasyBlade\Directives;


class RouteDirective implements Directive
{
    public function handle($parameter)
    {
        return "<?php echo route".$parameter." ?>";
    }
}