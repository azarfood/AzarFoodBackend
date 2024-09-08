<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;

class CreateServiceInterface extends GeneratorCommand
{
    protected $signature = 'make:service-interface {method} {name}';
    protected $description = 'Command description';
    protected $name = 'ddd';

    public function getStub(): string
    {
        return app_path() . '/Console/Commands/Stubs/ServiceInterface.stub';
    }

    public function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services\\' . $this->argument('name') . "\\" . $this->argument('method') . $this->argument('name');
    }

    protected function getNameInput(): string
    {
        return trim($this->argument('method') . $this->argument('name') . "ServiceInterface");
    }

    protected function buildClass($name): string
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)
            ->replaceLcEndpoint($stub, $name)
            ->replaceMethod($stub, $name)
            ->replaceLcMethod($stub, $name)
            ->replaceEndpoint($stub, $name)
            ->replaceReturn_type($stub, $name)
            ->replaceReturn_typeClass($stub, $name)
            ->replaceClass($stub, $name);
    }

    public function replaceClass($stub, $name): string
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace("hello", $this->argument('method') . $this->argument('name') . "ServiceInterface", $stub);
    }

    public function replaceEndpoint(&$stub, $name): static
    {
        $stub = str_replace("{{name}}", $this->argument('name'), $stub);
        return $this;
    }

    public function replaceLcEndpoint(&$stub, $name): static
    {
        $stub = str_replace("{{lcName}}", strtolower($this->argument('name')), $stub);
        return $this;
    }

    public function replaceMethod(&$stub, $name): static
    {
        $stub = str_replace("{{method}}", $this->argument('method'), $stub);
        return $this;
    }

    public function replaceLcMethod(&$stub, $name): static
    {
        $stub = str_replace("{{lcMethod}}", strtolower($this->argument('method')), $stub);
        return $this;
    }

    public function replaceReturn_type(&$stub, $name): static
    {
        if ($this->argument('method') == 'Index') {
            $returnType = 'Pagination\Pagination';
        } else {
            $returnType = $this->argument('name') . "\\" . $this->argument('name') . "DTO";
        }
        $stub = str_replace("{{return_type}}", $returnType, $stub);
        return $this;
    }

    public function replaceReturn_typeClass(&$stub, $name): static
    {
        if ($this->argument('method') == 'Index') {
            $returnType = 'Pagination';
        } else {
            $returnType = $this->argument('name') . "DTO";
        }

        $stub = str_replace("{{return_typeClass}}", $returnType, $stub);
        return $this;
    }

}
