<?php


use BladeTest\BladeTestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $this->assertEquals('<?php if(count($collection) >= 1): ?>', $this->compiler->compileString('@count($collection, 1)'));
        $this->assertEquals('<?php if(count([1, 2, 3, 4]) >= 1): ?>', $this->compiler->compileString('@count([1, 2, 3, 4], 1)'));
    }

    public function testCountDirectiveAct()
    {
        $array = collect(range(1, 5));
        $count = 5;
        $view = view('count', compact('array', 'count'))->render();
        $this->assertTrue(Str::contains($view, 'equal or greater'));
    }

    public function testEndCountDirective()
    {
        $this->assertEquals("<?php endif; ?>", $this->compiler->compileString("@endcount"));
    }

    public function testUserDirective()
    {
        $this->assertEquals("<?php if(\auth()->check()): echo \auth()->user()->name; endif; ?>", $this->compiler->compileString("@user('name')"));
    }

    public function testUserDirectiveWhenUserLoggedIn()
    {
        Auth::shouldReceive('check')
            ->once()
            ->andReturn(true);
        Auth::shouldReceive('user')
            ->once()
            ->andReturn((object) [
                'name' => 'reza'
            ]);
        $view = view('user')->render();
        $this->assertEquals($view, 'reza');
    }

    public function testUserDirectiveWhenUserNotLoggedIn()
    {
        Auth::shouldReceive('check')
            ->once()
            ->andReturn(false);
        Auth::shouldReceive('user')
            ->never();
        $view = view('user')->render();
        $this->assertNotEquals($view, 'reza');
    }

}