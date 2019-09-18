@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $project->title }} -> {{ $app->title }}</h1>
            <p><a class="btn btn-primary" href="{{ route('projects.apps.submissions.create', [$project, $app]) }}">Submit new report</a></p>

        </div>
    </div>
</div>

@endsection
