<?php

namespace App\Console\Commands;

use App\App;
use App\Project;
use App\Submission;
use App\TestCase;
use App\Predicate;
use Illuminate\Console\Command;

class CategoriseTestResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'testboard:categorize {app : The ID of the app}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Categorizes all test cases that don\'t belong to a component.';

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
        $app = App::find($this->argument('app'));
        \App\Jobs\CategoriseTestResults::dispatchNow($app->project);
    }
}
