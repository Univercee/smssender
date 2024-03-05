<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'expires_at' => 'datetime',
        'created_at' => 'datetime'
    ];

    //
    private static function generate(){
        $token = bin2hex(random_bytes(16));
        return $token;
    }

    //
    public static function setToken(int $user_id){
        $token = self::generate();
        Token::insert([
            'token' => $token,
            'user_id' => $user_id,
            'expires_at' => Carbon::now()->addDays(1)
        ]);
        return $token;
    }

    //
    public static function removeToken(int $user_id){
        Token::where('user_id', $user_id)->delete();
    }
}
