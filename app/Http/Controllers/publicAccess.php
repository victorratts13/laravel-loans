<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class publicAccess extends Controller
{
    public function index(){
        return view('app.public.index');
    }

    public function login(){
        return view('app.public.login');
    }

    public function register(){
        return view('app.public.register');
    }

    public function registerPost(Request $request){
        $client = $request->except(['_token']);
        $user = new User();
        $user->name = $client['name'];
        $user->lastname = $client['lastname'];
        $user->phone1 = $client['phone'];
        $user->cpf = $client['cpf'];
        $user->email = $client['email'];
        $user->password = Hash::make($client['password']); 
        $user->ip = $_SERVER['REMOTE_ADDR'];
        $user->reputation = 0;
        $user->accessType = 3;

        $user->save();
        return redirect()->route('app.public.login');
    }

    public function loginPost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        $user = User::where('email', $credentials['email'])->get();
        
        foreach ($user as $list) {
            //dd($list->accessType);
            if ($list->accessType == 3) {
                if (Auth::attempt($credentials)) {
                    return redirect()->route('app.cliente.dashboard');
                }
            }
            if ($list->accessType == 2) {
                if (Auth::attempt($credentials)) {
                    return redirect()->route('app.admin.dashboard');
                }
            }
            if ($list->accessType == 1) {
                if (Auth::attempt($credentials)) {
                    return redirect()->route('app.admin.dashboard');
                }
            }
        }
        return redirect()->back()->withInput()->withErrors(['Dados Invalidos..']);
    }
}
