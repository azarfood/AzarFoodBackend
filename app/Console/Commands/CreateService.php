<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class CreateService extends GeneratorCommand
{
    protected $signature = 'make:service {method} {endpoint}';
    protected $description = 'Command description';

    public function getStub(): string
    {
        return app_path() . '/Console/Commands/Stubs/Service.stub';
    }

    public function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services\\' . $this->argument('endpoint') . "\\" . $this->argument('method') . $this->argument('endpoint');
    }

    protected function getNameInput(): string
    {
        return trim($this->argument('method') . $this->argument('endpoint') . "ServiceConcrete");
    }

    protected function buildClass($name): string
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)
            ->replaceStub($stub, $name)
            ->replaceReturn_type($stub, $name)
            ->replaceReturn_typeClass($stub, $name)
            ->replaceClass($stub, $name);
    }

    public function replaceStub(&$stub, $name): static
    {
        $stub = str_replace("{{endpoint}}", $this->argument('endpoint'), $stub);
        $stub = str_replace("{{lcEndpoint}}", strtolower($this->argument('endpoint')), $stub);
        $stub = str_replace("{{method}}", $this->argument('method'), $stub);
        $stub = str_replace("{{lcMethod}}", strtolower($this->argument('method')), $stub);
        return $this;
    }

    public function replaceClass($stub, $name): string
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace("hello", $this->argument('method') . $this->argument('endpoint') . "ServiceInterface", $stub);
    }

    public function replaceReturn_type(&$stub, $name): static
    {
        if ($this->argument('method') == 'Index') {
            $returnType = 'Pagination\Pagination';
        } else {
            $returnType = $this->argument('endpoint') . "\\" . $this->argument('endpoint') . "DTO";
        }
        $stub = str_replace("{{return_type}}", $returnType, $stub);
        return $this;
    }

    public function replaceReturn_typeClass(&$stub, $name): static
    {
        if ($this->argument('method') == 'Index') {
            $returnType = 'Pagination';
        } else {
            $returnType = $this->argument('endpoint') . "DTO";
        }

        $stub = str_replace("{{return_typeClass}}", $returnType, $stub);
        return $this;
    }
}
