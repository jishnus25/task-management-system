@extends('layouts.admin-header')
@extends('layouts.admin-nav')


@section('admin-content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary text-white">Tasks List</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="mb-3">
                        <a href="{{ route('admin.tasks.create') }}" class="btn btn-success">Add Task</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Priority</th>
                                    <th>Task</th>
                                    <th>Assigned User</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
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
                                        <td>
                                            <span class="badge bg-secondary">
                                                {{ \App\Http\Constants\TaskConstants::PRIORITY[$task->priority] ?? '-' }}
                                            </span>
                                        </td>
                                        <td>{{ $task->task }}</td>
                                        <td>{{ $task->user ? $task->user->name : '-' }}</td>
                                        <td>{{ $task->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No tasks found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin-footer')
