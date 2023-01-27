<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index', [
            'user' => Auth::user()->load('roles'),
        ]);
    }
}
