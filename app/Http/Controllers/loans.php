<?php

namespace App\Http\Controllers;

use App\clientes;
use App\loan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loans extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = loan::all();
        return view('app.admin.launch', [
            'loans' => $all
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $colab = Auth::user();
        if ($_GET) {
            $clientId = $_GET['clientId'];
            $client = clientes::find($clientId);
            //dd($client->id);
            return view('app.admin.loans', [
                'colab' => $colab,
                'client' => $client
            ]);
        }else{
            return view('app.admin.loans', [
                'colab' => $colab,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $loans = new loan();
        $loans->name = $request->name;
        $loans->cpf = $request->cpf;
        $loans->userId = $request->userId;
        $loans->colabId = $request->colabId;
        $loans->colabName = $request->colabName;
        $loans->colabAccess = $request->colabAccess;
        $loans->uniqHash = Hash::make($request->cpf . $request->colabId);
        $loans->codeHash = Hash::make($request->cpf . $request->colabId . $request->userId);
        $loans->value = $request->value;
        $loans->parcels = $request->parcels;
        $loans->period = $request->period;
        $loans->jurs = $request->jurs;
        $loans->delayAcres = $request->delayAcres;
        $loans->uteis = $request->uteis;
        $loans->status = 0;
        $loans->save();

        return  redirect()->route('app.admin.launch');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(loan $loan)
    {
        $clients = User::find($loan['userId']);
        return view('app.admin.showloans', [
            'loan' => $loan,
            'user' => $clients
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(loan $loan)
    {
        $clients = User::find($loan['userId']);
        return view('app.admin.showloans', [
            'loan' => $loan,
            'user' => $clients
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loan $loan)
    {
        $loan->status = $request->status;
        $loan->save();
        return redirect()->route('app.admin.launch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(loan $loan)
    {
        $loan->delete();
        return redirect()->route('app.admin.loan');
    }
}
