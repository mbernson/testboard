<?php

namespace App\Http\Controllers;

use App\App;
use App\Project;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return view('apps.index')
            ->with('project', $project)
            ->with('apps', $project->apps()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('apps.create')->with('project', $project);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $app = new App();
        $app->project_id = $project->getKey();
        $app->fill($request->all());

        if ($app->save()) {
            return redirect()->route('projects.show', [$project]);
        } else {
            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, App $app)
    {
        return view('apps.show')
            ->with('project', $project)
            ->with('app', $app);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function edit(App $app)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, App $app)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\App  $app
     * @return \Illuminate\Http\Response
     */
    public function destroy(App $app)
    {
        //
    }
}
