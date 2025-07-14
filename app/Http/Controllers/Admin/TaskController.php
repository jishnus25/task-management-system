<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\TaskAssignedMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Constants\TaskConstants;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')->get();
        $statusLabels = TaskConstants::STATUS;
        $filterDto = null;
        return view('admin.tasks.index', compact('tasks', 'statusLabels', 'filterDto'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|max:2048',
            'priority' => 'nullable|integer',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tasks', 'public');
            $validated['image'] = basename($imagePath);
        }
        $task = Task::create($validated);
        Mail::to($task->user->email)->queue(new TaskAssignedMail($task));
        return redirect()->route('admin.tasks.index')->with('success', 'Task created and assigned!');
    }

    public function edit(Task $task)
    {
        $users = User::all();
        $statusLabels = TaskConstants::STATUS;
        $priorityLabels = TaskConstants::PRIORITY;
        return view('admin.tasks.edit', compact('task', 'users', 'statusLabels', 'priorityLabels'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'task' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|max:2048',
        ]);
        $wasReassigned = $task->user_id != $validated['user_id'];
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tasks', 'public');
            $validated['image'] = basename($imagePath);
        }
        $task->update($validated);

        if ($wasReassigned) {
            Mail::to($task->user->email)->queue(new TaskAssignedMail($task));
        }
        return redirect()->route('admin.tasks.index')->with('success', 'Task updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.tasks.index')->with('success', 'Task deleted!');
    }
}
