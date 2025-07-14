<?php

namespace App\Actions\User\Task;

use App\Models\Task;

class UpdateTaskAction
{
    public function execute(Task $task, array $data): Task
    {
        $task->update($data);
        return $task;
    }
}
