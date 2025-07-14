<?php

namespace App\Repositories;

use App\Models\Task;
use App\DataTransferObjects\User\Tasks\TaskFilterDTO;

class UserTaskRepository
{
    public function getFilteredTasksForUser($userId, TaskFilterDTO $filterDto, int $paginationLimit)
    {
        $query = Task::where('user_id', $userId);
        if ($filterDto->propertyExistsAndNotNull('progress')) {
            $query->where('progress', $filterDto->progress);
        }
        if ($filterDto->propertyExistsAndNotNull('priority')) {
            $query->where('priority', $filterDto->priority);
        }
        if ($filterDto->propertyExistsAndNotNull('start_date')) {
            $query->whereDate('created_at', '>=', $filterDto->start_date);
        }
        if ($filterDto->propertyExistsAndNotNull('end_date')) {
            $query->whereDate('created_at', '<=', $filterDto->end_date);
        }
        return $query->orderByDesc('created_at')->paginate($paginationLimit)->withQueryString();
    }
}
