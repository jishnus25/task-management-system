<?php

namespace App\Http\Services\Admin;

use App\Http\Repositories\UserRepository;

class DashboardService
{
    public function __construct(
        private readonly UserRepository $userRepository
    ){}


    public function getUserCount():int
    {
        return $this->userRepository->getUserCount();
    }

    public function getUserById(int $id)
    {
        return $this->userRepository->getUserById($id);
    }

}
