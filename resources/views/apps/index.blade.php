@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>{{ $project->title }} -> Apps</h1>

            <ul>
            @foreach($apps as $app)
                <li><a href="{{ route('projects.apps.show', [$project, $app]) }}">{{ $app->title }}</a></li>
            @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
