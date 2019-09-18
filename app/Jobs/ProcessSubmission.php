<?php

namespace App\Jobs;

use App\JunitParser\Parser;
use App\Submission;
use App\SubmissionStatus;
use App\TestCase;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessSubmission implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $submission;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->submission->update(['status' => SubmissionStatus::PROCESSING]);
        $submission_id = $this->submission->getKey();
        $app_id = $this->submission->app_id;
        $parser = new Parser();

        try {
            $results = $parser->parse($this->submission->report);
            $data = [];

            foreach ($results as $result) {
                $row = (array) $result;
                $row['app_id'] = $app_id;
                $row['submission_id'] = $submission_id;
                $row['created_at'] = new \DateTime();
                $row['updated_at'] = new \DateTime();
                $data[] = $row;
            }

            TestCase::insert($data);

            $this->submission->update(['status' => SubmissionStatus::PROCESSED]);
        } catch (\Exception $e) {
            Log::error('Submission failed', ['submission_id' => $submission_id]);
            Log::error($e, ['submission_id' => $submission_id]);
            $this->submission->update(['status' => SubmissionStatus::FAILED]);
        }
    }
}
