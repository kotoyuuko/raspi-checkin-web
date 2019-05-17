<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SignLog;

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

    public function saveLogs(Request $request)
    {
        foreach ($request->data as $item) {
            $log = new SignLog();
            $log->user_id = $item['user_id'];
            $log->start_at = $item['start_at'];
            $log->end_at = $item['end_at'];
            $log->save();
        }

        return [
            'status' => 200
        ];
    }
}
