<?php
namespace App\Repositories;

use App\Models\Task;

class UserDashboardRepository
{
    public function getUserTasks($userId)
    {
        return Task::where('user_id', $userId)->get();
    }
    public function countTasksByProgress($userId, $progress)
    {
        return Task::where('user_id', $userId)->where('progress', $progress)->count();
    }
    public function countAllTasks($userId)
    {
        return Task::where('user_id', $userId)->count();
    }
}
