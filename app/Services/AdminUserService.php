<?php
namespace App\Services;

use App\Repositories\AdminUserRepository;
use App\DataTransferObjects\Admin\UserManagementDTO;
use App\Models\User;
use App\Models\Admin;

class AdminUserService
{
    protected $repository;

    public function __construct(AdminUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllUsers()
    {
        return $this->repository->getAllUsers();
    }

    public function createUserOrAdmin(UserManagementDTO $dto)
    {
        if ($dto->role === 'admin') {
            return $this->repository->createAdmin($dto);
        }
        return $this->repository->createUser($dto);
    }

    public function updateUserOrAdmin($model, UserManagementDTO $dto)
    {
        if ($model instanceof Admin) {
            return $this->repository->updateAdmin($model, $dto);
        }
        return $this->repository->updateUser($model, $dto);
    }

    public function deleteUserOrAdmin($model)
    {
        if ($model instanceof Admin) {
            return $this->repository->deleteAdmin($model);
        }
        return $this->repository->deleteUser($model);
    }
}
