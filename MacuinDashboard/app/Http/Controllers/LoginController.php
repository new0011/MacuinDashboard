<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Departamentos;
use App\Models\roles;
use App\Models\ConsUser;
use App\Http\Requests\UserReq;
use App\Http\Requests\logReq;

class LoginController extends Controller
{
    protected $depto;
    protected $role;
    protected $CUser;
    protected $us;
    public function __construct(Departamentos $depto, roles $role, ConsUser $CUser, User $us){
        $this->depto = $depto;
        $this->role = $role;
        $this->CUser = $CUser;
        $this->us = $us;
    }
    public function home(){
        return view('home');
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
    public function register(UserReq $req){
        $user = new User();

        $user->nameU = $req->nameU;
        $user->LastNameP = $req->LastNameP;
        $user->LastNameM = $req->LastNameM;
        $user->id = $req->id;
        $user->IDEP = $req->IDEP;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        Auth::login($user);

        if($req->id == 1) {
            $user->assignRole('Jefe');
        }
        if ($req->id == 2) {
            $user->assignRole('Auxiliar');
        }
        if($req->id == 3) {
            $user->assignRole('Cliente');
        }
        if($req->verify == 2){
            return redirect(route('login'))->with('conflog', 'Guardado Correctamente');
        }
        if($req->verify == 1){
            return redirect(route('login'))->with('conflog', 'Guardado Correctamente');
        }
    }
    public function getLogin(){
        return view('login');
    }
    public function login(logReq $req){
        $credentials = [
            "email" => $req->email,
            "password" => $req->password
        ];
        #$remember = ($req->has('remember') ? true : false);
        if(Auth::attempt($credentials)){
            $req->session()->regenerate();
            return redirect(route('home'))->with('conflog', 'Guardado Correctamente');
        }else{
            return redirect(route('login'))->with('conflog1', 'Guardado Correctamente');
        }
    }
    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect(route('login'));
    }
    public function edit($id){
        $dep = $this->depto->getAllDepart();
        $users=$this->us->getIdUser($id);
        return view('editUser', compact('users', 'dep'));
    }

    public function destroy($id){
        $Us=User::find($id);
        $Us->delete();
        return redirect(route('consUser'))->with('confDel', 'Eliminado Correctamente');
    }
}