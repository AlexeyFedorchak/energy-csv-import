<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('content.pages.admin.dashboard');
    }
    public function showUsers()
    {
        $users = User::all(); // Retrieve all user records from the 'users' table

        return view('content.pages.admin.users.show', ['users' => $users]);
    }
}
