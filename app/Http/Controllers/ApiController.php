<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ApiController extends Controller
{
    public function listUsers()
    {
        $users = User::paginate(20);

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'fingerprint' => $user->fingerprint,
                'mac' => $user->mac,
            ];
        }

        return [
            'status' => 200,
            'total' => $users->total(),
            'per_page' => $users->perPage(),
            'data' => $data,
        ];
    }
}
