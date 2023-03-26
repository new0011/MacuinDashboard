<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Departamentos;
use App\Models\Role;
use App\Models\ConsUser;

class LoginController extends Controller
{
    protected $depto;
    protected $role;
    protected $CUser;
    public function __construct(Departamentos $depto, Role $role, ConsUser $CUser){
        $this->depto = $depto;
        $this->role = $role;
        $this->CUser = $CUser;
    }
    public function datesSelect(){
        $dep = $this->depto->getAllDepart();
        $rol = $this->role->getAllRole();
        return view('registerU', compact('dep', 'rol'));
    }
    public function users(){
        $CU = $this->CUser->getAllDatosU();
        return view('consUser', compact('CU'));
    }
    public function registerOut(Request $req){
        $dep = $this->depto->getAllDepart();
        return view('registerUOut', compact('dep'));
    }
    public function register(Request $req){
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

        if($req->IDRole == 1) {
            $user->assignRole('Jefe');
        }
        if ($req->IDRole == 2) {
            $user->assignRole('Auxiliar');
        }
        if($req->IDRole == 3) {
            $user->assignRole('Cliente');
        }
        if($req->verify == 2){
            return redirect(route('login'));
        }
        if($req->verify == 1){
            return redirect(route('registerU'));
        }
    }
    public function getLogin(){
        return view('login');
    }
    public function login(Request $req){
        $credentials = [
            "email" => $req->email,
            "password" => $req->password
        ];
        #$remember = ($req->has('remember') ? true : false);
        if(Auth::attempt($credentials)){
            $req->session()->regenerate();
            return redirect(route('registerU'));
        }else{
            return redirect(route('login'));
        }
    }
    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect(route('login'));
    }
}