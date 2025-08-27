<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return view('admin.dashboard');
        }

        if ($user->role === 'student') {
            return view('student.dashboard');
        }

        // Fallback for any other roles or if role is not set
        return view('dashboard');
    }
}
