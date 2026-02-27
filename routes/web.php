<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isActive;
use App\Http\Middleware\admin;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ProductsController;


Route::get('/', function () {
    return view('welcome');
});
//groupe middleware isActive
Route::middleware(isActive::class)->group(function () {



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




//page de client pour les produits
Route::get('/dashboard', [ProductsController::class,'index'])->name('dashboard');

//page produit (PDP)
Route::get('/product/{id}', [ProductsController::class,'show'])->name('product.show');

//afficher panier
Route::get('/bag',
[ProductsController::class,'Bag'])->middleware(['auth', 'verified'])->name('Bag');

//ajouter produit au panier
Route::get('/dashboard/addBag/{code}',
[ProductsController::class,'addBag'])->middleware(['auth', 'verified'])->name('addBag');

//supprimer produit du panier
Route::get('/dashboard/suppPro/{code}',
[ProductsController::class,'suppPro'])->middleware(['auth', 'verified'])->name('suppPro');

//plus produit 
Route::get('/dashboard/addBag/plusProduct/{code}',
[ProductsController::class,'plusProduct'])->middleware(['auth', 'verified'])->name('plusProduct');

//moins produit
Route::get('/dashboard/addBag/moinsProduct/{code}',
[ProductsController::class,'moinsProduct'])->middleware(['auth', 'verified'])->name('moinsProduct');


//page valider commande
Route::get('/commander',
[ProductsController::class,'commander'])->middleware(['auth', 'verified'])->name('commander');
Route::get('/commander/validerCommande',
[ProductsController::class,'validerCommande'])->middleware(['auth', 'verified'])->name('validerCommande');

//page commande
Route::get('/commande',
[ProductsController::class,'Commande'])->middleware(['auth', 'verified'])->name('Commande');


/*
Route::get('/cart',
[ProductsController::class,'Cart'])->middleware(['auth', 'verified'])->name('Cart');
*/
    


//groupe middleware isActive
Route::middleware(admin::class)->group(function () {

//afficher user
Route::get('/users',
[adminController::class,'index'])->middleware(['auth', 'verified'])->name('user');
//supprimer user
Route::get('/user/supprimer/{code}',
[adminController::class,'supprimerUser'])->middleware(['auth', 'verified'])->name('supprimerUser');
//activer user
Route::get('/user/activer/{code}',
[adminController::class,'activer'])->middleware(['auth', 'verified'])->name('activer');
//desactiver user
Route::get('/user/desactiver/{code}',
[adminController::class,'desactiver'])->middleware(['auth', 'verified'])->name('desactiver');


//page de gerer les produits pour admin
Route::get('/gererProducts',
[adminController::class,'gereProduct'])->middleware(['auth', 'verified'])->name('gereProduct');

//supprimer produits
Route::get('/gererProducts/supprimer/{code}',
[adminController::class,'deleteProduct'])->middleware(['auth', 'verified'])->name('deleteProduct');

//ajouter produit 
Route::get('/gererProducts/createProduct',
[adminController::class,'createProduct'])->middleware(['auth', 'verified'])->name('createProduct');
Route::get('/gererProducts/addProduct',
[adminController::class,'addProduct'])->middleware(['auth', 'verified'])->name('addProduct');

//modifier produit
Route::get('/gererProducts/showProduct/{code}',
[adminController::class,'showProduct'])->middleware(['auth', 'verified'])->name('showProduct');
Route::get('/gererProducts/updateProduct/{code}',
[adminController::class,'updateProduct'])->middleware(['auth', 'verified'])->name('updateProduct');


//liste livraison
Route::get('/livraison',
[adminController::class,'livraison'])->middleware(['auth', 'verified'])->name('livraison');

//valider livraison
Route::get('/livraison/{code}',
[adminController::class,'valider'])->middleware(['auth', 'verified'])->name('valider');

});// fin de groupe middleware admin



});// fin de groupe middleware isActive
require __DIR__.'/auth.php';
