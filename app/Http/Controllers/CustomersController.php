<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use DateTime;
use Error;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //
    public function get(Request $request, int $id){
        try {
            $data = Customer::where('id', $id)->first();
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Some error occurred"
            ], 500);
        }
    }

    //
    public function getAll(Request $request){
        try {
            $data = Customer::get();
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Some error occurred"
            ], 500);
        }
    }

    //
    public function create(Request $request){
        try {
            $data = $request->all();
            if(!isset($data['firstname']) || !isset($data['lastname']) || !isset($data['birthdate']) || !isset($data['phone'])){
                throw new Error("Заполните все поля");
            }
            $existed_user =  Customer::where('phone', $data['phone'])->first();
            if($existed_user){
                throw new Error("Пользователь с таким номером уже существует");
            }
            if(!preg_match('/^\+(?:[0-9] ?){6,14}[0-9]$/', $data['phone'])){
                throw new Error("Неверный формат телефона");
            }
            $id = Customer::insertGetId([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'birthdate' => $data['birthdate'],
                'phone' => $data['phone']
            ]);
            return response()->json([
                "message" => "Пользователь добавлен",
                "id" => $id
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 500);
        }
    }

    //
    public function update(Request $request, int $id){
        try {
            $data = $request->all();
            if(!isset($data["id"]) || !isset($data['firstname']) || !isset($data['lastname']) || !isset($data['birthdate']) || !isset($data['phone'])){
                throw new Error("Заполните все поля");
            }
            $existed_user =  Customer::where('phone', $data['phone'])->first();
            if($existed_user && $existed_user->id != $data["id"]){
                throw new Error("Пользователь с таким номером уже существует");
            }
            if(!preg_match('/^\+(?:[0-9] ?){6,14}[0-9]$/', $data['phone'])){
                throw new Error("Неверный формат телефона");
            }
            $id = Customer::where('id', $id)->update([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'birthdate' => $data['birthdate'],
                'phone' => $data['phone']
            ]);
            return response()->json([
                "message" => "Пользователь обновлен"
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 500);
        }
    }

    //
    public function delete(Request $request, int $id){
        try {
            Customer::where('id', $id)->delete();
            return response()->json([
                "message" => "Пользователь удален",
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Some error occurred"
            ], 500);
        }
    }

    //
    public function send(Request $request, int $id){
        
    }
}
