<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\View\View;

class AdminController extends Controller
{
   
    public function index(): View
    {
        $admins = \App\Models\Admin::orderByDesc('created_at')->get();
        $statusLabels = [];
        return view('admin.admins.index', compact('admins', 'statusLabels'));
    }
}
