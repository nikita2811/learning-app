<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function test()
    {
        dd(Auth::check());
        //echo "Hello";
        // $vueRoute = 'login';
        // return redirect($vueRoute);
    }
}
