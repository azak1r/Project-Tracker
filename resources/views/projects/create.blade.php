@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('storeProject') }}">
        @csrf
        <div class="form-group">
            <label for="projectName">Project Name</label>
            <input type="text" class="form-control" id="projectName" name="projectName" aria-describedby="nameHelp" placeholder="Enter project name"></input>
            <small id="nameHelp" class="form-text text-muted">This is the name that will be used to track the project status.</small>
        </div>
        <div class="form-group">
            <label for="materialInput">Material Input Box</label>
            <textarea class="form-control" id="materialInput" name="materialInput" aria-describedby="materialHelp" rows="3"></textarea>
            <small id="materialHelp" class="form-text text-muted">Copy/Paste the content of a blueprint or contact Azakir Nalda to get a raw material calculation done.</small>
        </div>
        <input id="character" name="character" type="hidden" value="{{ Auth::user()->username }}">
        <button type="submit" class="btn btn-primary">Submit Project</button>
        </form>
    </div>
@endsection