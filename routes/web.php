<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ComentaireController;
use App\Http\Controllers\CategorieController;
use Illuminate\Container\Attributes\Auth;

$_SESSION['user_id'] = 1;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return 'sahnoun';
});

// Route::get('/store/{category}/{item?}', function ($category = null , $item = null) {
//     if(isset($category)){
//         if(isset($item)){
//             // return '<h1>'.$item.'</h1>';
//             return "<h1>{$item}</h1>";

//         }
//         // return '<h1>'.$category.'</h1>';
//         return "<h1>{$category}</h1>";


//     }
//     return '<h1>store</h1>';
// });



////////

// Route::get('/welcome', function () {
//    $filter=  request('sahnoun') ;
//    if(isset($filter)){
//     return 'this page is viewing <span style = "color: red">'.strip_tags($filter).'</span>';

//    }
//    return 'this page is viewing <span style = "color: red">All product</span>';

// });



// Route::get('/dashbordAnnonce' , [StaticController::class , 'index']);
// Route::get('annonce/dashbordAnnonce' , [AnnonceController::class , 'dashbordAnnonce']);

Route::POST('annonce.index' , [AnnonceController::class , 'index']);
Route::POST('annonce.show' , [AnnonceController::class , 'index']);
Route::POST('annonce.details' , [AnnonceController::class , 'index']);
Route::POST('comments/store' , [ComentaireController::class , 'store']);



Route::get('/annonce', [CategorieController::class, 'index']);

Route::resource('annonce', AnnonceController::class);
// Route::resource('annonce', ComentaireController::class);

Route::get('/annonce', [CategorieController::class, 'index']);

Route::resource('annonce', AnnonceController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';