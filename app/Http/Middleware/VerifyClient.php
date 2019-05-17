<?php

namespace App\Http\Middleware;

use Closure;
use App\Client;

class VerifyClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header('Token');
        if (!$token) {
            return [
                'status' => 403,
                'message' => 'Token not found',
            ];
        }

        $client = Client::findByToken($token);
        if (!$client) {
            return [
                'status' => 403,
                'message' => 'Client not found by token',
            ];
        }

        return $next($request);
    }
}
