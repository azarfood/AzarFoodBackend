<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class CreateDTO extends GeneratorCommand
{
    protected $signature = 'make:dto {endpoint}';
    protected $description = 'Command description';

    public function getStub(): string
    {
        return app_path() . '/Console/Commands/Stubs/DTO.stub';
    }


    public function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\DTO\\' . $this->argument('endpoint');
    }

    protected function getNameInput(): string
    {
        return trim($this->argument('endpoint') . "DTO");
    }

    protected function buildClass($name): string
    {
        $stub = $this->files->get($this->getStub());

        return $this->replaceNamespace($stub, $name)
            ->replaceStub($stub, $name)
            ->replaceClass($stub, $name);
    }

    public function replaceStub(&$stub, $name): static
    {
        $stub = str_replace("{{endpoint}}", $this->argument('endpoint'), $stub);
        $stub = str_replace("{{lcEndpoint}}", strtolower($this->argument('endpoint')), $stub);
        return $this;
    }

    public function replaceClass($stub, $name): array|string
    {
        $stub = parent::replaceClass($stub, $name);

        return str_replace("hello", $this->argument('endpoint') . "DTO", $stub);
    }

}
