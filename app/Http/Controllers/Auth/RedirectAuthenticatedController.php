<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectAuthenticatedController extends Controller
{
    public function index(): RedirectResponse
    {
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->role == 'user') {
            return redirect()->route('user.homepage');
        } else {
            return auth()->logout();
        }
    }
}
