@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form method="POST" action="{{ route('projects.apps.submissions.store', [$project->getKey(), $app->getKey()]) }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Test report</label>
                    <input type="file" name="report" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>

@endsection
