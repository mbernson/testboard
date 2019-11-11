@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $project->title }} &rarr; {{ $app->title }}</h1>
            <p><a class="btn btn-primary" href="{{ route('projects.apps.submissions.create', [$project, $app]) }}">Submit new report</a></p>

            <ul>
                <li><a href="{{ route('projects.apps.submissions.index', [$project, $app]) }}">Result submissions ({{ $app->submissions->count() }})</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection
