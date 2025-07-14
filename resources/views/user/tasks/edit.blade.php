@extends('layouts.user-header')

@section('user-content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card">
                <div class="card-header bg-info text-white">Update Task Status</div>
                <div class="card-body">
                    <form action="{{ route('user.tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="progress" class="form-label">Status <span class="text-danger">*</span></label>
                            <select class="form-select" id="progress" name="progress" required>
                                @foreach($statusLabels as $value => $label)
                                    <option value="{{ $value }}" @if($task->progress == $value) selected @endif>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority <span class="text-danger">*</span></label>
                            <select class="form-select" id="priority" name="priority" required>
                                @foreach(\App\Http\Constants\TaskConstants::PRIORITY as $value => $label)
                                    <option value="{{ $value }}" @if($task->priority == $value) selected @endif>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Task Image (optional)</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            @if($task->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/tasks/' . $task->image) }}" alt="Task Image" class="img-thumbnail" style="max-width:120px;">
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                        <a href="{{ route('user.tasks.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
