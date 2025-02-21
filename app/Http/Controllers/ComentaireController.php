<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Annonce;
use Illuminate\Http\Request;

class ComentaireController extends Controller
{
    public function index()
    {

        $comments = Commentaire::all();
        return view('annonce.show', ['comments' => $comments]);


    }

    public function create()
    {
        return view('annonce.show');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment' => 'required',
            'id_annonce' => 'required|exists:annonces,id'
        ]);

        $comment = Commentaire::create($validatedData);
        return redirect()->back()->with('success', 'Commentaire ajouté avec succès');
    }

    public function show(string $id)
    {
        $annonce = Annonce::findOrFail($id);
    
        $comments = Commentaire::where('id_annonce', $id)->get();
    
        // Passer les données à la vue
        return view('annonce.show', [
            'annonce' => $annonce,
            'comments' => $comments,
        ]);
    }


    
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $comment = Commentaire::findOrFail($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Commentaire supprimé avec succès');
    }
}