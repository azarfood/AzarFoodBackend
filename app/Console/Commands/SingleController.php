<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Input\InputOption;

class SingleController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature =
        'make:endpoint {name} {--a|all} {--i|index} {--c|create} {--s|show} {--u|update} {--d|delete} {--m|modelDto}';

    /**
     * The console command descriAption.
     *
     * @var string
     */
    protected $description = 'create all single controller';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        if ($this->option('all')) {
            $this->input->setOption('index', true);
            $this->input->setOption('create', true);
            $this->input->setOption('show', true);
            $this->input->setOption('update', true);
            $this->input->setOption('delete', true);
        }

        if ($this->option('index')) {
            $this->createIndex($name);
        }

        if ($this->option('create')) {
            $this->createCreate($name);
        }

        if ($this->option('show')) {
            $this->createShow($name);
        }

        if ($this->option('update')) {
            $this->createUpdate($name);
        }

        if ($this->option('delete')) {
            $this->createDelete($name);
        }

        if ($this->option('modelDto')) {
            Artisan::call("make:dto " . $name);
        }
    }

    private function createIndex($name)
    {
        Artisan::call("make:myController Index " . $name);
        Artisan::call("make:service Index " . $name);
        Artisan::call("make:service-interface Index " . $name);
        Artisan::call("make:request $name" . "/Index" . $name . "Request");
        Artisan::call("make:requestDto Index " . $name);
    }

    private function createCreate($name)
    {
        Artisan::call("make:myController Create " . $name);
        Artisan::call("make:service Create " . $name);
        Artisan::call("make:service-interface Create " . $name);
        Artisan::call("make:request $name" . "/Create" . $name . "Request");
        Artisan::call("make:requestDto Create " . $name);
    }

    private function createShow($name)
    {
        Artisan::call("make:myController Show " . $name);
        Artisan::call("make:service Show " . $name);
        Artisan::call("make:service-interface Show " . $name);
        Artisan::call("make:request $name" . "/Show" . $name . "Request");
        Artisan::call("make:requestDto Show " . " $name");
    }

    private function createUpdate($name)
    {
        Artisan::call("make:myController Update " . $name);
        Artisan::call("make:service Update " . $name);
        Artisan::call("make:service-interface Update " . $name);
        Artisan::call("make:request $name" . "/Update" . $name . "Request");
        Artisan::call("make:requestDto Update " . $name);
    }

    private function createDelete($name)
    {
        Artisan::call("make:myController Delete " . $name);
        Artisan::call("make:service Delete " . $name);
        Artisan::call("make:service-interface Delete " . $name);
        Artisan::call("make:request $name" . "/Delete" . $name . "Request");
        Artisan::call("make:requestDto Delete " . $name);
    }

    protected function getOptions(): array
    {
        return [
            ['all', 'a', InputOption::VALUE_NONE, 'Create All files'],
            ['index', 'i', InputOption::VALUE_NONE, 'CreateIndex files'],
            ['create', 'c', InputOption::VALUE_NONE, 'CreateCreate files'],
            ['show', 's', InputOption::VALUE_NONE, 'CreateShow files'],
            ['update', 'u', InputOption::VALUE_NONE, 'CreateUpdate files'],
            ['delete', 'd', InputOption::VALUE_NONE, 'CreateDelete files'],
            ['modelDto', 'm', InputOption::VALUE_NONE, 'Create DTO file'],
        ];
    }
}
