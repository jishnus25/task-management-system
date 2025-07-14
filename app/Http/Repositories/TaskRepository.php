<?php
namespace App\Http\Repositories;

use App\Models\Task;
use App\Http\Constants\TaskConstants;

class TaskRepository
{
    public function getTaskCountsByProgress(): array
    {
        return [
            'pending' => Task::where('progress', TaskConstants::PENDING)->count(),
            'in_progress' => Task::where('progress', TaskConstants::IN_PROGRESS)->count(),
            'completed' => Task::where('progress', TaskConstants::COMPLETED)->count(),
        ];
    }
}
