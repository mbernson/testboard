@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $project->title }}</h1>

            <ul>
                <li><a href="{{ route('projects.apps.index', $project) }}">Apps</a></li>
                <li><a href="{{ route('projects.components.index', $project) }}">Components</a></li>
            </ul>

            <p><a class="btn btn-primary" href="{{ route('projects.apps.create', [$project->getKey()]) }}">Create new app</a></p>

        </div>
    </div>
</div>

@endsection
