<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/','AccueilController@getCategories');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('Produit/{id}','ProduitController@getProduits');
Route::get('Panier','PanierController@getPanier');
Route::post('AjoutPanier/{id}', 'PanierController@ajouterPanier');
Route::post('SupprimerPanier/{id}', 'PanierController@supprimerPanier');
Route::post('Commande', 'CommandeController@checkAuth');
Route::get('infosCommande','CommandeController@getInfos');
Route::get('connexion', 'CommandeController@identification');
Route::post('ajoutCommande','CommandeController@ajoutCommande');

