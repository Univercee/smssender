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
            if(!$data['firstname'] || !$data['lastname'] || !$data['birthdate'] || !$data['phone']){
                throw new Error("Заполните все поля");
            }
            $id = Customer::insertGetId([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'birthdate' => $data['birthdate'],
                'phone' => $data['phone']
            ]);
            return response()->json($id, 200);
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
            if(!$data['firstname'] || !$data['lastname'] || !$data['birthdate'] || !$data['phone']){
                throw new Error("Заполните все поля");
            }
            $id = Customer::where('id', $id)->update([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'birthdate' => $data['birthdate'],
                'phone' => $data['phone']
            ]);
            return response()->json($id, 200);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 500);
        }
    }

    //
    public function delete(Request $request, int $id){
        try {
            $deleted = Customer::where('id', $id)->delete();
            return response()->json($deleted);
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
