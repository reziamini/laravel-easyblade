<?php

use BladeTest\BladeTestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        $this->assertEquals('<?php endif; ?>', $this->compiler->compileString('@endcount'));
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
                'name' => 'reza',
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

    public function testEndSessionExistsDirective()
    {
        $this->assertEquals('<?php endif; ?>', $this->compiler->compileString('@endsessionExists'));
    }

    public function testSessionExistsDirectiveStyle()
    {
        $this->assertEquals("<?php if(session()->exists('foo')): ?>", $this->compiler->compileString("@sessionExists('foo')"));
    }

    public function testSessionExistsDirective()
    {
        // When session exists ...
        Session::shouldReceive('exists')
            ->once()
            ->with('foo')
            ->andReturn(true);
        $view = view('sessionExists')->render();
        $this->assertTrue(Str::contains($view, 'exists'));

        // When session does not exist ...
        Session::shouldReceive('exists')
            ->once()
            ->with('foo')
            ->andReturn(false);
        $view = view('sessionExists')->render();
        $this->assertFalse(Str::contains($view, 'exists'));
    }

    public function testSessionDirectiveStyle()
    {
        $this->assertEquals("<?php if(\session()->exists('foo')){ echo \session()->get('foo'); } ?>", $this->compiler->compileString("@session('foo')"));
    }

    public function testSessionDirectiveWorks()
    {
        Session::shouldReceive('exists')
            ->once()
            ->with('foo')
            ->andReturn(true);
        Session::shouldReceive('get')
            ->once()
            ->with('foo')
            ->andReturn('hello');
        $view = view('session')->render();
        $this->assertEquals($view, 'hello');
    }

    public function testSessionDirectiveNotWork()
    {
        Session::shouldReceive('exists')
            ->once()
            ->with('foo')
            ->andReturn(false);
        Session::shouldReceive('get')
            ->never();
        $view = view('session')->render();
        $this->assertEquals($view, '');
    }

    public function testImageDirective()
    {
        $this->assertEquals("<img src='http://localhost/foo' class='foo'>", $this->compiler->compileString("@image('foo', 'foo')"));
        $this->assertEquals("<img src='http://localhost/foo' class=''>", $this->compiler->compileString("@image('foo')"));
        $this->assertEquals("<img src='http://localhost/foo' class='foo bar'>", $this->compiler->compileString("@image('foo', 'foo bar')"));
    }

    public function testStyleDirective()
    {
        $this->assertEquals("<link href='/css/style.css' rel='stylesheet'>", $this->compiler->compileString("@style('/css/style.css')"));
    }

    public function testScriptDirective()
    {
        $this->assertEquals("<script src='/js/script.js'></script>", $this->compiler->compileString("@script('/js/script.js')"));
        $this->assertEquals("<script src='/js/script.js' defer></script>", $this->compiler->compileString("@script('/js/script.js', true)"));
    }

    public function testConfigDirectiveStyle()
    {
        $this->assertEquals("<?php echo config('app.name') ?>", $this->compiler->compileString("@config('app.name')"));
        $this->assertEquals("<?php echo config('app.name', 'Laravel') ?>", $this->compiler->compileString("@config('app.name', 'Laravel')"));
    }

    public function testConfigDirectiveWork()
    {
        config()->set('app.name', 'EasyBlade');
        $view = view('config')->render();
        $this->assertTrue(Str::contains($view, 'EasyBlade'));
        $this->assertTrue(Str::contains($view, 'Laravel'));
    }

    public function testOldDirectiveWork()
    {
        $this->assertEquals("<?php echo old('name') ?>", $this->compiler->compileString("@old('name')"));
        $this->assertEquals("<?php echo old('name', 'hello') ?>", $this->compiler->compileString("@old('name', 'hello')"));
    }
}