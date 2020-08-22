<?php

namespace App\Http\Controllers;

use App\management;
use App\adminPerfil;
use App\clientes;
use App\loan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminAccess extends Controller
{
    public function dash()
    {
        return view('app.admin.dashboard');
    }

    public function launch()
    {
        $loans = loan::all();
        return view('app.admin.launch', [
            'loan' => $loans
        ]);
    }

    public function notify()
    {
        return view('app.admin.notifications');
    }

    public function table()
    {
        $all = clientes::all();
        $loan = loan::all();
        return view('app.admin.tables', [
            'cli' => $all,
            'loan' => $loan
        ]);
    }

    public function type()
    {
        $all = management::all();
        return view('app.admin.typography', [
            'colabs' => $all
        ]);
        //return view('app.admin.typography');
    }

    public function user()
    {
        $user = Auth::user();
        return view('app.admin.user', [
            'user' => $user
        ]);
    }

    public function profile(Request $request)
    {
        $id = $request->all();
        $loan = loan::all();
        $user = User::find($id['userId']);
        //dd($id['userId']);
        return view('app.admin.profie', [
            'user' => $user,
            'loan' => $loan
        ]);
    }

    public function userUpdate(Request $request){
        $user = $request->except(['_token']);
        $param = [
            'name' => $user['name'],
            'lastname' => $user['lastname'],
            'cpf' => $user['cpf'],
            'rg' => $user['rg'],
            'address' => $user['address'],
            'city' => $user['city'],
            'state' => $user['state'],
            'cep' => $user['cep'],
        ];

        adminPerfil::find(Auth::user()->id)->update($param);
        return redirect()->route('app.admin.user');

    }

    public function payment()
    {
        if($_GET){
            if(isset($_GET['client'])){
                $id = $_GET['client'];
                $loans = loan::where('userId', $id)->get();
                //dd($loans);
                return view('app.admin.loanList', [
                    'loans' => $loans
                ]);
            }
            if(isset($_GET['loanId'])){
                $clid = $_GET['loanId'];
                $loan = loan::find($clid);
                return view('app.admin.loanPayment', [
                    'loanGet' => $loan
                ]);
            }
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('app.public.login');
    }

    public function search(Request $request)
    {
        $client = User::where('name', $request->search)->orWhere('lastname', $request->search)->get();
        return view('app.admin.search', [
            'query' => $client
        ]);
    }

    public function comp()
    {
        return view('app.admin.comp');
    }
}
