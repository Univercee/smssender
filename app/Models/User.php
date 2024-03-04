<?php

namespace App\Models;

use Error;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    //
    public static function getByToken(string $token): int{
        $user = app('db')->select("SELECT user_id FROM tokens
                                    WHERE token = :token AND expires_at > NOW()",
                                    ['token' => $token]);
        return empty($user) ? null : $user[0]->user_id;
    }

    //
    public static function login($email, $password): string{
        try {
            $user = User::where('email', $email)->first();
            if(!$user){
                throw new Error("User not found");
            }
            $password_hash = $user->password;
            $password_match = password_verify($password, $password_hash);
            if(!$password_match){
                throw new Error("User not found");
            }
            $token = Token::setToken($user->id);
            return $token;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    //
    public static function logout(int $user_id){
        try {
            Token::removeToken($user_id);
        } catch (\Throwable $th) {
            throw $th; 
        }
    }
}
