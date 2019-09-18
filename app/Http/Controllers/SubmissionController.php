<?php

namespace App\Http\Controllers;

use App\App;
use App\Jobs\ProcessSubmission;
use App\Project;
use App\Submission;
use App\SubmissionStatus;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project, App $app)
    {
        return view('submissions.index')
            ->with('project', $project)
            ->with('app', $app)
            ->with('submissions', $app->submissions()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project, App $app)
    {
        return view('submissions.create')
            ->with('project', $project)
            ->with('app', $app)
            ->with('submissions', $app->submissions()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project, App $app)
    {

        $submission = new Submission();
        $submission->app_id = $app->getKey();

        $file = $request->file('report');

        if (is_null($file)) {
            return response('No file received', 400);
        }

        if (!$file->isValid()) {
            return response('Invalid file received', 400);
        }

        $submission->report = $file->get();
        $submission->status = SubmissionStatus::PENDING;

        if ($submission->save()) {
            ProcessSubmission::dispatchNow($submission); // TODO: Async processing
            return response('OK', 201);
        } else {
            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Submission $submission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
