<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use DB;

use App\App;
use App\Project;
use App\Submission;
use App\TestCase;
use App\Predicate;

class CategoriseTestResults implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Project
     */
    private $project;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->performDatabaseOperations();

        // try {
        //     DB::beginTransaction();
        //     $this->performDatabaseOperations();
        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     throw $e;
        // }
    }

    private function performDatabaseOperations() {
        $project = $this->project;
        /** @var App[] */
        $apps = $this->project->apps()->get();

        foreach ($apps as $app) {
            /** @var Predicate[] */
            $predicates = $project->predicates()->get();

            /** @var Submission[] */
            $submissions = $app->submissions()->get();

            foreach ($submissions as $submission) {
                /** @var TestCase[] */
                $testCases = $submission->testCases()
                    ->whereNull('component_id')
                    ->get();

                echo "Project {$this->project->getKey()}\n";
                echo "Submission {$submission->getKey()}\n";
                echo count($testCases) . " test cases\n";

                foreach ($testCases as $testCase) {
                    /** @var TestCase $testCase */
                    foreach ($predicates as $predicate) {
                        if ($predicate->matchesTestCase($testCase)) {
                            $updated = $testCase->update(['component_id' => $predicate->component_id]);
                            echo vsprintf("Test case %s matches component %s. Updated: %s\n", [$testCase->name, $predicate->component_id, $updated ? 'true' : 'false']);
                        }
                    }
                }
            }
        }
    }
}
