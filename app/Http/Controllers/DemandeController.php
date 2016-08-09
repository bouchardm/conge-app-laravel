<?php

namespace App\Http\Controllers;

use App\Demande;
use App\Http\Requests\Demande\ListDemandesRequest;
use App\Http\Requests\Demande\PostDemandeRequest;
use App\Http\Requests\Demande\UpdateDemandeRequest;

use App\Http\Requests;

class DemandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function saveDemande(PostDemandeRequest $request)
    {
        Demande::create($request->only('raison', 'debut', 'fin', 'type'));

        return redirect('demande')->with('success', 'Demande envoyé!');
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
        $demandes = Demande::latest();
        if ($request->has('traite')) {
            $demandes->whereNotNull('approuve');
        } else {
            $demandes->whereNull('approuve');
        }

        return view('demandes')->with('demandes', $demandes->paginate(10));
    }
}
