@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form method="POST" action="{{ route('projects.store') }}">
                @csrf

                <div class="form-group">
                    <label>Project title</label>
                    <input type="text" name="title" class="form-control" placeholder="{{ Arr::random(['Pinstagram', 'Yahoogle']) }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection
