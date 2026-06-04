<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Hardcoded counts — replace with real queries as modules are built
        $stats = [
            'pages' => 8,
            'posts' => 24,
            'products' => 4,
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
