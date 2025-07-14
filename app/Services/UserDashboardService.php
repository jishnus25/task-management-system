<?php
namespace App\Services;

use App\Repositories\UserDashboardRepository;
use App\Http\Constants\TaskConstants;

class UserDashboardService
{
    protected $repository;

    public function __construct(UserDashboardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getDashboardStats($userId)
    {
        return [
            'totalTasks' => $this->repository->countAllTasks($userId),
            'pending' => $this->repository->countTasksByProgress($userId, TaskConstants::PENDING),
            'inProgress' => $this->repository->countTasksByProgress($userId, TaskConstants::IN_PROGRESS),
            'completed' => $this->repository->countTasksByProgress($userId, TaskConstants::COMPLETED),
        ];
    }
}
