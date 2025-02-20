<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class AnnonceController extends Controller
{

 //array of static data
  
   private static function getdata(){}

//    public function search(Request $request)
//    {
//        $search = $request->input('search'); 
//        $annonce = Annonce::where(function($query) use ($search) {
//            $query->where('titre', 'like', "%$search%")
//                  ->orWhere('lieu', 'like', "%$search%");
//                 //  ->orWhere('categorie', 'like', "%$search%"); 
//        })->get();
   
//        return view('annonce.search', compact('annonce', 'search')); 
       
//    }

       /**
        * Display a listing of the resource.
        */
       public function index()
       {
        $annonce= Annonce::all();
        return view('annonce.index' , compact('annonce'));
       }
   
       /**
        * Show the form for creating a new resource.
        */
       public function create()
       {
           return view('annonce.create');
       }
   
       /**
        * Store a newly created resource in storage.
        */
       public function store(Request $request)
       {
           $validatedData = $request->validate([
               'titre' => 'required',
               'email' => 'required',
               'description' => 'required',
               'photos' => 'required',
               'date' => 'required',
               'lieu' => 'required',
               'phone' => 'required'
           ]);
   
           $annonce = Annonce::create($validatedData);
           return redirect('/annonce')->with('success', 'Ajouté avec succès');
       }
   
   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $annonce= Annonce::all();
        return view('annonce.index' , compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
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