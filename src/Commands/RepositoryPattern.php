<?php

namespace Hakeem\Extra\Commands;

use Illuminate\Console\Command;
use Hakeem\Extra\Service\RepositoryService;
use Illuminate\Support\Facades\Artisan;

class RepositoryPattern extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'extra:sr {name : Class (Singular), e.g User, Place, Car, Post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Repository Pattern with full Development Line using single command contain
                              (Controller ,Model, Migration,Service,Repository, Repository Interface)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');

        RepositoryService::ImplementNow($name);

        Artisan::call('make:model ' . $name . '  -m');
        Artisan::call('make:factory ' . $name . 'Factory  --model=' . $name);

        shell_exec('composer dump-autoload');

        $this->info("Repository Service pattern implemented for model " . $name);

        $message = '$this->app->bind(' . $name . 'RepositoryInterface::class, ' . $name . 'Repository::class);';

        $this->info("Copy the following line inside AppServiceProvider@register : ");
        $this->info($message);
    }
}
