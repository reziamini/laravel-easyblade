<?php

namespace BladeTest;



use EasyBlade\EasyBladeServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class BladeTestCase extends TestCase
{

    protected $compiler;

    public function setUp(): void
    {
        parent::setUp();

        $this->compiler = app('blade.compiler');
    }

    protected function getPackageProviders($app)
    {
        return [
            EasyBladeServiceProvider::class
        ];
    }
}