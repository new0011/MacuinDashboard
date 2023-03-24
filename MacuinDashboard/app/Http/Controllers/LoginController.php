<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $request){
        $user = new User();

        $user->nameU = $req->nameU;
        $user->LastNameP = $req->LastNameP;
        $user->LastNameM = $req->LastNameM;
        $user->IDRole = $req->IDRole;
        $user->IDEP = $req->IDEP;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();

        Auth::login($user);

        return redirect(route('consDepart'));
    }
    public function login(Request $req){

    }
}