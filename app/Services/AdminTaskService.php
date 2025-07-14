<?php

namespace App\Services;

use App\Repositories\AdminTaskRepository;
use App\DataTransferObjects\Admin\TaskFilterDTO;

class AdminTaskService
{
    protected $repo;

    public function __construct(AdminTaskRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getFilteredTasks(TaskFilterDTO $filterDto, int $paginationLimit)
    {
        return $this->repo->getFilteredTasks($filterDto, $paginationLimit);
    }
}
