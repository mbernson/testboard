@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $project->title }} &rarr; {{ $app->title }} &rarr; Submissions</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($submissions as $sub)
                        <tr>
                            <th scope="row">{{ $sub->getKey() }}</th>
                            <td>{{ $sub->status }}</td>
                            <td>{{ $sub->created_at }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
