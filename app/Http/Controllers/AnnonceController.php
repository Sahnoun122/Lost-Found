<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class AnnonceController extends Controller
{

 //array of static data
  
   private static function getdata(){}



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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}