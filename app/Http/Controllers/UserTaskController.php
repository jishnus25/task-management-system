<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Constants\TaskConstants;
use App\Services\UserTaskService;
use App\Http\Requests\User\Tasks\TaskListRequest;
use App\DataTransferObjects\User\Tasks\TaskFilterDTO;
use App\Actions\User\Task\UpdateTaskAction;

class UserTaskController extends Controller
{
    protected $taskService;

    public function __construct(UserTaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index(TaskListRequest $request)
    {
        $user = Auth::user();
        $filterDto = TaskFilterDTO::fromRequest($request);
        $tasks = $this->taskService->getFilteredTasksForUser(
            $user->id,
            $filterDto,
            \App\Http\Constants\CommonConstants::PAGINATION_LIMIT
        );
        $statusLabels = TaskConstants::STATUS;
        return view('user.tasks.index', compact('tasks', 'statusLabels', 'filterDto'));
    }

    public function edit(Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $statusLabels = TaskConstants::STATUS;
        $priorityLabels = TaskConstants::PRIORITY;
        return view('user.tasks.edit', compact('task', 'statusLabels', 'priorityLabels'));
    }

    public function update(TaskListRequest $request, Task $task, UpdateTaskAction $updateTaskAction)
    {
        $data = $request->only(['progress', 'priority']);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tasks', 'public');
            $data['image'] = basename($imagePath);
        }
        $updateTaskAction->execute($task, $data);
        return redirect()->route('user.tasks.index')->with('success', 'Task updated!');
    }
}
