@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="jumbotron">
            <h1 class="display-4" center>Project list</h1>
            <hr class="my-4">
            <p>Below you will find buttons that will take you to the project tracker.</p>
            <p class="lead">
            @foreach($projects as $project)
                <a class="btn btn-primary btn-lg" href="{{ route('showProject', ['id' => $project->id]) }}" role="button">{{$project->projectName}}</a>
            @endforeach
            </p>
        </div>
    </div>
@endsection