<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class CreateRequestDTO extends GeneratorCommand
{
    protected $signature = 'make:requestDto {method} {endpoint}';
    protected $description = 'Command description';

    public function getStub(): string
    {
        return app_path() . '/Console/Commands/Stubs/RequestDTO.stub';
    }


    public function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\DTO\\' . $this->argument('endpoint') . "\\Request";
    }

    protected function getNameInput(): string
    {
        return trim("Request" . $this->argument('method') . $this->argument('endpoint') . "DTO");
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
        $stub = str_replace("{{method}}", $this->argument('method'), $stub);
        $stub = str_replace("{{lcMethod}}", strtolower($this->argument('method')), $stub);
        return $this;
    }

    public function replaceClass($stub, $name): array|string
    {
        $stub = parent::replaceClass($stub, $name);

        return str_replace("hello", "Request" . $this->argument('method') . $this->argument('endpoint') . "DTO", $stub);
    }

}
