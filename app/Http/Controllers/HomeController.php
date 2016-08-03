<?php

namespace App\Http\Controllers;

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
        return redirect('home')->with('success', 'Demande envoyé!');
    }
}
