<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Http\Requests;
use App\Http\Requests\DemandeRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function saveDemande(DemandeRequest $request)
    {
        Demande::create($request->only('raison', 'debut', 'fin', 'type'));

        return redirect('home')->with('success', 'Demande envoyé!');
    }

    public function demandes()
    {
        return view('demandes')->with('demandes', Demande::all());
    }
}
