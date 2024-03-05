<?php

namespace App\Http\Controllers;

use App\Data\Mails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Managers\SMSC;
use Error;
use Illuminate\Support\Facades\Artisan;

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
            if(!isset($data["name"])){
                throw new Error("Имя не указано");
            }
            SMSC::send_sms($data["phone"], Mails::getBirthdayMessage($data["name"]), 1);
            return response()->json([
                "message" => "Успешный вызов API. Проверить статус: <a href='https://smsc.ru/sms/'>https://smsc.ru/sms/</a>"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 500);
        }
    }

    public function sendAll(Request $request){
        try {
            $count = Artisan::call('sms:send');
            return response()->json([
                "message" => "Успешный вызов API. Отправлено сообщений: $count"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 500);
        }
    }
}
