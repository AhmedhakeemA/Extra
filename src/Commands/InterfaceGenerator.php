<?php

namespace Hakeem\Extra\Commands;


use Illuminate\Console\GeneratorCommand;


class InterfaceGenerator extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'extra:interface';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new a interface';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return resource_path('extra/stubs/Interface.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace;
    }
}
