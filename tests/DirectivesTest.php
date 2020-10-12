<?php


use BladeTest\BladeTestCase;

class DirectivesTest extends BladeTestCase
{

    public function testRouteDirective()
    {
        $this->assertEquals("<?php echo route('foo') ?>", $this->compiler->compileString("@route('foo')"));
    }

}