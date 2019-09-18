@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $project->title }} -> Components</div>

                <div class="card-body">

                <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($components as $comp)
                <tr>
                    <th scope="row">{{ $comp->getKey() }}</th>
                    <td>{{ $comp->title }}</td>
                </tr>
                @endforeach
                </tbody>
                </table>


            <form method="POST" action="{{ route('projects.components.store', [$project->getKey()]) }}">
                @csrf

                <div class="form-group">
                    <label>Component title</label>
                    <input type="text" name="title" class="form-control" placeholder="{{ Arr::random(['Shipments', 'My Mail', 'Receive']) }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
