<?php

namespace EasyBlade\Directives;

use EasyBlade\Contract\Directivable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class isActiveDirective implements Directivable
{
    public static function handle($parameter)
    {
        return "<?php echo \\EasyBlade\\Directives\\isActiveDirective::render($parameter) ?>";
    }

    public static function render($list, $type = 'active', $else = '')
    {
        if (is_array($list)) {
            return (in_array(Route::getCurrentRoute()->getName(), $list)) ? $type : $else;
        }

        return Str::is($list, Route::getCurrentRoute()->getName()) ? $type : $else;
    }

}