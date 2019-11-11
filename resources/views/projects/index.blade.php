@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>

                <div class="card-body">
                    <p><a class="btn btn-primary" href="{{ route('projects.create') }}">Create new project</a></p>

                    <ul>
                        @foreach($projects as $proj)
                            <li><a href="{{ route('projects.show', $proj->getKey()) }}">{{ $proj->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
