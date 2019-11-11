@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $project->title }}</h1>

            <ul>
                <li><a href="{{ route('projects.apps.index', $project) }}">Apps ({{ $project->apps->count() }})</a></li>
                <li><a href="{{ route('projects.components.index', $project) }}">Components ({{ $project->components->count() }})</a></li>
            </ul>

        </div>
    </div>
</div>

@endsection
