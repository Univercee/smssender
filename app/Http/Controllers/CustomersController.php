<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use DateTime;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    //
    public function get(Request $request, int $id){
        $data = Customer::where('id', $id)->first();
        return response()->json($data);
    }

    //
    public function getAll(Request $request){
        $data = Customer::get();
        return response()->json($data);
    }

    //
    public function create(Request $request){
        $data = $request->all();
        $id = Customer::insertGetId([
            'name' => $data['name'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'birthdate' => $data['birthdate'],
            'phone' => $data['phone']
        ]);
        return response()->json($id, 200);
    }

    //
    public function update(Request $request, int $id){
        $data = $request->all();
        $id = Customer::where('id', $id)->update([
            'name' => $data['name'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'birthdate' => $data['birthdate'],
            'phone' => $data['phone']
        ]);
        return response()->json($id, 200);
    }

    //
    public function delete(Request $request, int $id){
        $deleted = Customer::where('id', $id)->delete();
        return response()->json($deleted);
    }

    //
    public function send(Request $request, int $id){
        
    }
}
