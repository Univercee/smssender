<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Managers\SMSC;
use Error;

class SMSController extends Controller
{
    public function getBalance(){
        $balance = SMSC::get_balance();
        return response()->json([
            "balance" => $balance
        ]);
    }

    public function send(Request $request){
        try {
            $data = $request->all();
            if(!isset($data["phone"])){
                throw new Error("Телефон не указан");
            }
            $response = SMSC::send_sms($data["phone"], "Ваш пароль: 123", 1);
            return response()->json([
                "message" => "Успешный вызов API. Проверить статус: <a href='https://smsc.ru/sms/'>https://smsc.ru/sms/</a>"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "response" => $th->getMessage()
            ], 500);
        }
    }
}