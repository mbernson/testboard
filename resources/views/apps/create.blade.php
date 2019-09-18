@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form method="POST" action="{{ route('projects.apps.store', [$project->getKey()]) }}">
                @csrf

                <div class="form-group">
                    <label>App title</label>
                    <input type="text" name="title" class="form-control" placeholder="{{ Arr::random(['iOS app', 'Android app', 'Flutter app', 'Web app', 'Backend']) }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection
