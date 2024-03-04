<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAuthorized
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        if($token){
            $user_id = User::getByToken($token);
            if($user_id){
                $request->merge(['user_id' => $user_id]);
                return $next($request);
            }
        }
        return response()->json(['Error'=>"Unauthorized"], 401);
    }
}
