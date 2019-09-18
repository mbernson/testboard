@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>

                <p><a class="btn btn-primary" href="{{ route('projects.create') }}">Create new project</a></p>

                <div class="card-body">
                    <ul>
                        @foreach($projects as $project)
                            <li><a href="{{ route('projects.show', $project->getKey()) }}">{{ $project->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
