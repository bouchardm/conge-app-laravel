<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Http\Requests;
use App\Http\Requests\ListDemandesRequest;
use App\Http\Requests\PostDemandeRequest;
use App\Http\Requests\UpdateDemandeRequest;
use Auth;
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

    public function saveDemande(PostDemandeRequest $request)
    {
        Demande::create($request->only('raison', 'debut', 'fin', 'type'));

        return redirect('home')->with('success', 'Demande envoyé!');
    }

    public function updateDemande(UpdateDemandeRequest $request, $id)
    {
        $demande = Demande::findOrFail($id);
        $demande->approuve = $request->get('approuve') == "true";
        $demande->save();

        return redirect('demandes')->with('success', 'Demande mis à jour');
    }

    public function demandes(ListDemandesRequest $request)
    {
        return view('demandes')
            ->with('demandes', Demande::where([])->orderBy('created_at', 'desc')->paginate(10));
    }
}
