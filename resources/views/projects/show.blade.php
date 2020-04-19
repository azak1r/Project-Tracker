@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Project: {{$project->projectName}}</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md justify-content-center">
            <div class="card">
                <h5 class="card-header">Minerals</h5>
                <div class="card-body">
                    @foreach($materials as $material)
                        @if($material->material_cat === 'Mineral')
                        <h5 class="card-title">{{$material->material_name}}</h5>
                        <p class="card-text">0 / {{$material->quantity}}</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md justify-content-center">
            <div class="card">
                <h5 class="card-header">P4 PI Material</h5>
                <div class="card-body">
                    @foreach($materials as $material)
                        @if($material->material_cat === 'P4 PI Material')
                        <h5 class="card-title">{{$material->material_name}}</h5>
                        <p class="card-text">0 / {{$material->quantity}}</p>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection