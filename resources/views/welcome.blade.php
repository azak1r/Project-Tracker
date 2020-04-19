@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to the PDE industry tracking tool!</h1>
            <p class="lead">This is a simple tracker tool to track our current corp projects.</p>
            <hr class="my-4">
            <p>It uses automated ESI calls to pull the content of the project containers and share it through this tool. It allows simple sharing of information.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ route('projects') }}" role="button">Go to project list</a>
            </p>
        </div>
    </div>
@endsection