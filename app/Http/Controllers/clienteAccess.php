<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clienteAccess extends Controller
{
    public function dash(){
        return view('app.cliente.dashboard');
    }

    public function notify(){
        return view('app.cliente.notifications');
    }

    public function table(){
        return view('app.cliente.tables');
    }

    public function type(){
        return view('app.cliente.typography');
    }

    public function user(){
        return view('app.cliente.user');
    }
}
