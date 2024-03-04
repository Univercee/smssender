<?php

namespace App\Http\Middleware;

use Closure;
use App\Managers\SessionsManager;
use Workbench\App\Models\User;

class isAuthorized
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