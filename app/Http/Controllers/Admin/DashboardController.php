<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use Illuminate\View\Factory;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly \App\Http\Repositories\TaskRepository $taskRepository
    ){}

    public function dashboard():Factory|View
    {
        $users = $this->userRepository->getUserCount();
        $taskCounts = $this->taskRepository->getTaskCountsByProgress();
        return view('admin.dashboard')->with(compact('users', 'taskCounts'));
    }
}
