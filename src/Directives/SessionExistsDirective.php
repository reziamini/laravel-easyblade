<?php


namespace EasyBlade\Directives;

class SessionExistsDirective implements Directive
{

    /**
     * @param $parameter
     * @return string
     */
    public static function handle($parameter)
    {
        return "<?php if(session()->exists({$parameter})): ?>";
    }

}
