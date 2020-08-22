<?php

namespace App\Http\Controllers;

use App\management;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class managements extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $all = management::all();
        return view('app.admin.typography', [
            'colabs' => $all
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.managements');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colab = new management();
        $user = new User();

        
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone1 = $request->phone;
        $user->rg = 'null';
        $user->perfilFile = 'null';
        $user->docFile1 = 'null';
        $user->docFile2 = 'null';
        $user->compAddress = 'null';
        $user->phone2 = 'null';
        //$user->phone2 = 'null';
        $user->facebook = 'null';
        $user->instagram = 'null';
        $user->ocupation = 'null';
        $user->reputation = '0';
        $user->registerFrom = Auth::user()->id;
        $user->manegeFrom = Auth::user()->email;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->cep = $request->cep;
        $user->accessType = $request->accessType;
        $user->password = Hash::make('tsemprestimos'.$request->name);
        $user->save();
        $colab->name = $request->name;
        $colab->lastname = $request->lastname;
        $colab->email = $request->email;
        $colab->phone = $request->phone;
        $colab->cpf = $request->cpf;
        $colab->address = $request->address;
        $colab->state = $request->state;
        $colab->city = $request->city;
        $colab->cep = $request->cep;
        $colab->accessType = $request->accessType;
        $colab->userId = User::where('email', $request->email)->get('id');
        $colab->banca = $request->banca;
        $colab->save();

        return redirect()->route('app.admin.management.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\management  $management
     * @return \Illuminate\Http\Response
     */
    public function show(management $management)
    {
        return view('app.admin.showManagements', [
            'colab' => $management
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\management  $management
     * @return \Illuminate\Http\Response
     */
    public function edit(management $management)
    {
        return view('app.admin.showManagements', [
            'colab' => $management
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\management  $management
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, management $management)
    {
        //$colab = new management();

        $management->name = $request->name;
        $management->lastname = $request->lastname;
        $management->email = $request->email;
        $management->phone = $request->phone;
        $management->cpf = $request->cpf;
        $management->address = $request->address;
        $management->state = $request->state;
        $management->city = $request->city;
        $management->cep = $request->cep;
        $management->accessType = $request->accessType;
        $management->userId = User::where('email', $request->email)->get('id');
        $management->banca = $request->banca;
        $management->save();

        return redirect()->route('app.admin.management.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\management  $management
     * @return \Illuminate\Http\Response
     */
    public function destroy(management $management)
    {
        $management->delete();
        return redirect()->route('app.admin.index');
    }
}
