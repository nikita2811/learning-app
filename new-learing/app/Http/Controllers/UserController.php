<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        return response()->json('User Created Successfully', 200);
    }
}
