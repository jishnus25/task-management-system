<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Constants\TaskConstants;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(\App\Services\UserDashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function dashboard()
    {
        $user = auth()->user();
        $stats = $this->dashboardService->getDashboardStats($user->id);
        return view('user.dashboard', $stats);
    }
} 