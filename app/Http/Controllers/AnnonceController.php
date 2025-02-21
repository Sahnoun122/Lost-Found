<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Categories;
use App\Models\Commentaire;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class AnnonceController extends Controller
{
//  array of static data

 public function index(request $request)
 {
     $annonce = Annonce::query();

     if ($request->has('search')) {

         $annonce->where(function ($q) use ($request) {
             $q->where('titre', 'like', '%' . $request->search . '%')
                 ->orwhere('description', 'like', '%' . $request->search . '%');

         });
     }
 
     $countAnnonce = Annonce::count('id');
     $views = Annonce::orderBy('titre', 'desc')
         ->take(5)
         ->get();

     $annonce = $annonce->paginate(6)->appends($request->except('page'));
     return view('annonce.index', compact('annonce', 'countAnnonce'));
    // return redirect()->back();
 }
 
   private static function getdata(){}

       public function create()
       {
            $categories = Categories::all();

            return view('annonce.create', ['categories' => $categories]);
       }
   
       public function store(Request $request)
       {
           $validatedData = $request->validate([
               'titre' => 'required',
               'description' => 'required',
               'photos' => 'required',
               'lieu' => 'required',
               'date' => 'required',
               'email' => 'required',
               'phone' => 'required',
               'id_categorie' => 'required'
           ]);
         

           $annonce = Annonce::create($validatedData);
           return redirect('/annonce')->with('success', 'Ajouté avec succès');
       }
   
    public function show(string $id)
    { 
         
        $annonce = Annonce::findOrFail($id);
 
        $comments = Commentaire::where('id_annonce', $id)->get();
    
        return view('annonce.show', [
            'annonce' => $annonce,
            'comments' => $comments,
        ]);
    }


    public function edit(string $id)
    {
        $annonce = Annonce::findOrFail($id);
        return view('annonce.edit', compact('annonce'));
    }
    
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'titre' => 'required',
            'email' => 'required|email',
            'description' => 'required',
            'photos' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
            'lieu' => 'required',
            'phone' => 'required',
        ]);
    
        if ($request->hasFile('photos')) {
            $file = $request->file('photos');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/photos', $filename);
            $validatedData['photos'] = $filename;
        }
    
        Annonce::whereId($id)->update($validatedData);
        return redirect()->route('annonce.index')->with('success', 'Annonce mise à jour avec succès');
    }



    /**
     * Remove the specified resource from storage.
     */


    public function destroy(string $id)
    {
        $annonce = Annonce::findOrFail($id);
        $annonce->delete();
        return redirect()->route('annonce.index')->with('success', 'Annonce supprimer avec succès');

    }

}