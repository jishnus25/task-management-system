<?php

namespace App\Actions\User\Task;

use App\Models\Task;
use Illuminate\Http\Request;

class AddTaskAction
{
    public function execute(array $data, int $userId): Task
    {
        $task = Task::create([
            'user_id' => $userId,
            'task' => $data['task'],
            'progress' => $data['progress'],
            'priority' => $data['priority'],
            'image' => $data['image'] ?? null,
        ]);

        return $task;
    }
}
