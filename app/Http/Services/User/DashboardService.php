<?php

namespace App\Http\Services\User;

use App\Http\Repositories\UserRepository;

readonly class DashboardService
{
    public function __construct(
        private UserRepository $userRepository
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
