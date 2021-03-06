<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SignLog;
use App\FingerprintRequest;

class ApiController extends Controller
{
    public function listUsers()
    {
        $users = User::paginate(200);

        $data = [];
        foreach ($users as $user) {
            $data[] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
                'fingerprint' => json_decode($user->fingerprint, true),
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

    public function saveFingerprint(Request $request)
    {
        $requestId = $request->request_id;
        $fingerprint = json_encode($request->fingerprint);

        $fingerprintRequest = FingerprintRequest::find($requestId);

        if (!$fingerprintRequest) {
            return response(404)->json([
                'status' => 404,
                'message' => 'Fingerprint request not found',
            ]);
        }

        $otherRequests = FingerprintRequest::where([
            ['user_id', $fingerprintRequest->user_id],
            ['status', 'available'],
        ])->get();

        foreach ($otherRequests as $req) {
            $req->status = 'discarded';
            $req->save();
        }

        $fingerprintRequest->fingerprint = $fingerprint;
        $fingerprintRequest->status = 'available';
        $fingerprintRequest->save();

        $otherRequests = FingerprintRequest::where([
            ['user_id', $fingerprintRequest->user_id],
            ['status', 'waiting'],
        ])->get();

        foreach ($otherRequests as $req) {
            $req->delete();
        }

        $user = User::find($fingerprintRequest->user_id);
        $user->fingerprint = $fingerprint;
        $user->save();

        return [
            'status' => 200
        ];
    }
}
