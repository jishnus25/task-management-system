@extends('layouts.user-header')

@section('user-content')
<div class="container-fluid">
    <div class="row justify-content-center mt-4">
        <div class="col-md-6 col-lg-4">
            <div class="card text-white bg-primary mb-3 shadow">
                <div class="card-header">Total Tasks Assigned</div>
                <div class="card-body">
                    <h5 class="card-title display-4">{{ $totalTasks }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3 shadow">
                        <div class="card-header">Pending Tasks</div>
                        <div class="card-body">
                            <h5 class="card-title display-6">{{ $pending }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3 shadow">
                        <div class="card-header">In Progress Tasks</div>
                        <div class="card-body">
                            <h5 class="card-title display-6">{{ $inProgress }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3 shadow">
                        <div class="card-header">Completed Tasks</div>
                        <div class="card-body">
                            <h5 class="card-title display-6">{{ $completed }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection