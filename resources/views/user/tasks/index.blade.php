@extends('layouts.user-header')

@section('user-content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">My Tasks</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form method="GET" class="mb-4" autocomplete="off">
    <div class="row g-3 align-items-end">
        <div class="col-md-3">
            <label for="progress" class="form-label">Progress</label>
            <select name="progress" id="progress" class="form-select">
                <option value="">All</option>
                @foreach($statusLabels as $key => $label)
                    <option value="{{ $key }}" {{ (isset($filterDto) && $filterDto->progress !== null && $filterDto->progress == $key) ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="priority" class="form-label">Priority</label>
            <select name="priority" id="priority" class="form-select">
                <option value="">All</option>
                @foreach(\App\Http\Constants\TaskConstants::PRIORITY as $key => $label)
                    <option value="{{ $key }}" {{ (isset($filterDto) && $filterDto->priority !== null && $filterDto->priority == $key) ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" name="start_date" id="start_date" value="{{ isset($filterDto) && $filterDto->start_date ? $filterDto->start_date : '' }}">
        </div>
        <div class="col-md-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" name="end_date" id="end_date" value="{{ isset($filterDto) && $filterDto->end_date ? $filterDto->end_date : '' }}">
        </div>
        <div class="col-md-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('user.tasks.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </div>
</form>
<div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>Priority</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tasks as $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($task->image)
                                                <img src="{{ asset('storage/tasks/' . $task->image) }}" alt="Task Image" class="img-thumbnail" style="max-width:60px;">
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $task->task }}</td>
                                        <td>
    @php
        $badgeClass = match($task->progress) {
            0 => 'bg-danger',
            1 => 'bg-warning text-dark',
            2 => 'bg-success',
            default => 'bg-secondary'
        };
    @endphp
    <span class="badge {{ $badgeClass }}">
        {{ $statusLabels[$task->progress] ?? '-' }}
    </span>
</td>
<td>
    <span class="badge bg-secondary">
        {{ \App\Http\Constants\TaskConstants::PRIORITY[$task->priority] ?? '-' }}
    </span>
</td>
                                        <td>{{ $task->updated_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <a href="{{ route('user.tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Update Status</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No tasks assigned.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
{{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
