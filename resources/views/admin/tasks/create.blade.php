@extends('layouts.admin-header')
@extends('layouts.admin-nav')
@extends('layouts.admin-footer')

@section('admin-content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card">
                <div class="card-header bg-success text-white">Add Task</div>
                <div class="card-body">
                    <form action="{{ route('admin.tasks.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="task" class="form-label">Task</label>
                            <input type="text" class="form-control" id="task" name="task" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Assign to User</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="">Select User</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-select" id="priority" name="priority" required>
                                @foreach(\App\Http\Constants\TaskConstants::PRIORITY as $value => $label)
                                    <option value="{{ $value }}" @if(old('priority') == $value) selected @endif>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Task Image (optional)</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-success">Add Task</button>
                        <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
