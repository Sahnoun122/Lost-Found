<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Categories;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class AnnonceController extends Controller
{
 //array of static data

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

//    public function search(Request $request)
//    {
//        $search = $request->input('search'); 
//        $annonce = Annonce::where(function($query) use ($search) {
//            $query->where('titre', 'like', "%$search%")
//                  ->orWhere('lieu', 'like', "%$search%");
//                 //  ->orWhere('categorie', 'like', "%$search%"); 
//        })->get();
   
//     //    return redirect()->back();
//       return view('annonce.index', compact('annonce'));
       
//    }

//        /**
//         * Display a listing of the resource.
//         */
//        public function index()
//        {
//         $annonce= Annonce::all();
//         $categories = Categories::all();
//         return view('annonce.index', ['annonce' => $annonce,'categories' => $categories]);
//        }
   
       /**
        * Show the form for creating a new resource.
        */
       public function create()
       {
            $categories = Categories::all();

            return view('annonce.create', ['categories' => $categories]);
       }
   
       /**
        * Store a newly created resource in storage.
        */
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