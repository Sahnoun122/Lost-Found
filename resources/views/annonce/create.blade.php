@extends('Annonce')
@section('main')

<div class="row">
   @if($errors->any())
   <div class="alert alert-danger">
    <ul>
        @foreach($errors->any() as $error )
             <li>{{ $error }}</li>
        @endforeach
    @endif
    </ul>

   </div>
<form class="p-4 md:p-5" method="POST" action="{{ route('annonce.store') }}">
    @csrf
    <div class="grid gap-4 mb-4 grid-cols-2">
        <!-- Champ Longueur -->
        <div class="col-span-2 sm:col-span-1">
            <label for="longueur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Longueur (en cm)</label>
            <input type="text" name="titre" id="titre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez la longueur" >
        </div>

        <!-- Champ Largeur -->
        <div class="col-span-2 sm:col-span-1">
            <label for="largeur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Largeur (en cm)</label>
            <input type="text" name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez la largeur">
        </div>

        <!-- Champ Hauteur -->
        <div class="col-span-2 sm:col-span-1">
            <label for="hauteur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hauteur (en cm)</label>
            <input type="file" name="photos" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez la hauteur">
        </div>

        <!-- Champ Poids -->
        <div class="col-span-2 sm:col-span-1">
            <label for="poids" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Poids (en kg)</label>
            <input type="date" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez le poids" >
        </div>

        <!-- Champ Départ -->
        <div class="col-span-2 sm:col-span-1">
            <label for="lieu" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lieu de départ</label>
            <input type="text" name="lieu" id="lieu" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez le lieu de départ">
        </div>

        <!-- Champ Destination -->
        <div class="col-span-2 sm:col-span-1">
            <label for="destination" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Destination</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez la destination" >
        </div>
        <div class="col-span-2 sm:col-span-1">
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Téléphone</label>
            <input type="phone" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Entrez le numéro de téléphone" >
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>
</div>
@endsection
