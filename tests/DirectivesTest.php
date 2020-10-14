<?php


use BladeTest\BladeTestCase;

class DirectivesTest extends BladeTestCase
{

    public function testRouteDirective()
    {
        $this->assertEquals("<?php echo route('foo') ?>", $this->compiler->compileString("@route('foo')"));
    }

    public function testURLDirective()
    {
        $this->assertEquals("<?php echo url('foo') ?>", $this->compiler->compileString("@url('foo')"));
    }

    public function testAssetDirective()
    {
        $this->assertEquals("<?php echo asset('foo') ?>", $this->compiler->compileString("@asset('foo')"));
    }

    public function testisActiveDirective()
    {
        $this->assertEquals("<?php echo \\EasyBlade\\Directives\\isActiveDirective::render('foo') ?>", $this->compiler->compileString("@isActive('foo')"));
        $this->assertEquals("<?php echo \\EasyBlade\\Directives\\isActiveDirective::render(['foo'], 'active') ?>", $this->compiler->compileString("@isActive(['foo'], 'active')"));
        $this->assertEquals("<?php echo \\EasyBlade\\Directives\\isActiveDirective::render(['foo'], 'active', null) ?>", $this->compiler->compileString("@isActive(['foo'], 'active', null)"));
    }

    public function testCountDirective()
    {
        config()->set('view.paths', [
            __DIR__.'/views',
        ]);
        $array = collect(range(1, 5));
        $count = 5;
        $view = view('count', compact('array', 'count'))->render();
        $this->assertTrue(\Illuminate\Support\Str::contains($view, 'equal or greater'));
        $this->assertEquals('<?php if(count($collection) >= 1): ?>', $this->compiler->compileString('@count($collection, 1)'));
        $this->assertEquals('<?php if(count([1, 2, 3, 4]) >= 1): ?>', $this->compiler->compileString('@count([1, 2, 3, 4], 1)'));
    }

    public function testEndCountDirective()
    {
        $this->assertEquals("<?php endif; ?>", $this->compiler->compileString("@endcount"));
    }

    public function testUserDirective()
    {
        $this->assertEquals("<?php echo \auth()->user()->name; ?>", $this->compiler->compileString("@user('name')"));
    }

}