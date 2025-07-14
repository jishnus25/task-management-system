<?php
namespace App\Repositories;

use App\Models\User;
use App\Models\Admin;
use App\DataTransferObjects\Admin\UserManagementDTO;

class AdminUserRepository
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser(UserManagementDTO $dto)
    {
        return User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => bcrypt($dto->password),
        ]);
    }

    public function createAdmin(UserManagementDTO $dto)
    {
        return Admin::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => bcrypt($dto->password),
        ]);
    }

    public function updateUser(User $user, UserManagementDTO $dto)
    {
        $user->name = $dto->name;
        $user->email = $dto->email;
        if ($dto->password) {
            $user->password = bcrypt($dto->password);
        }
        $user->save();
        return $user;
    }

    public function updateAdmin(Admin $admin, UserManagementDTO $dto)
    {
        $admin->name = $dto->name;
        $admin->email = $dto->email;
        if ($dto->password) {
            $admin->password = bcrypt($dto->password);
        }
        $admin->save();
        return $admin;
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function deleteAdmin(Admin $admin)
    {
        $admin->delete();
    }
}
