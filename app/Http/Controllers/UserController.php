<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function usersWithRoles()
    {
        $users = User::with('roles')->get();
        return response()->json($users);
    }
}
