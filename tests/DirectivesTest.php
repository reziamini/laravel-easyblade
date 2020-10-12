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

}