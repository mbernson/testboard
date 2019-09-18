@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Projects</div>

                <p>{{ $project->title }} -> {{ $app->title }} -> Submissions</p>

                <div class="card-body">
                    <ul>
                        @foreach($submissions as $sub)
                            <li>{{ $sub->created_at }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
