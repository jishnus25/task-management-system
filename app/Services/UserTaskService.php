<?php

namespace App\Services;

use App\Repositories\UserTaskRepository;
use App\DataTransferObjects\User\Tasks\TaskFilterDTO;

class UserTaskService
{
    protected $repo;

    public function __construct(UserTaskRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getFilteredTasksForUser($userId, TaskFilterDTO $filterDto, int $paginationLimit)
    {
        return $this->repo->getFilteredTasksForUser($userId, $filterDto, $paginationLimit);
    }
}
