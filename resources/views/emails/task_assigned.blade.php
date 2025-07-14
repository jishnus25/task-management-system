@extends('layouts.email')

@section('content')
    <div style="background:#f8f9fa; padding:30px; border-radius:10px;">
        <h2 style="color:#181C32;">New Task Assigned</h2>
        <p>Hello {{ $task->user->name }},</p>
        <p>You have been assigned a new task:</p>
        <p><strong>{{ $task->task }}</strong></p>
        <p>Please log in to your account to view and manage your tasks.</p>
        <br>
        <p style="color:#888">Thank you,<br>Admin Team</p>
    </div>
@endsection
