<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagementRequest;
use App\Services\AdminUserService;
use App\DataTransferObjects\Admin\UserManagementDTO;
use App\Models\User;
use App\Models\Admin;

class UserController extends Controller
{
    protected $userService;

    public function __construct(AdminUserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }


    public function store(UserManagementRequest $request)
    {
        $dto = UserManagementDTO::fromRequest($request);
        $this->userService->createUserOrAdmin($dto);
        return redirect()->route('admin.users.index')->with('success', 'User added successfully!');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserManagementRequest $request, $user)
    {
        $dto = UserManagementDTO::fromRequest($request);
        $this->userService->updateUserOrAdmin($user, $dto);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($user)
    {
        $this->userService->deleteUserOrAdmin($user);
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
