<?php

namespace App\Http\Controllers;

use App\Modeles\AccueilDAO;
use App\Modeles\ProduitDAO;

use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //
    public function getProduits($id){
        $produit = new ProduitDAO();
        $categorie = new AccueilDAO();
        $lesProduits = $produit->getLesProduits($id);
        $laCategorie = $categorie->getCategorieById($id);
        $lesCategories = $categorie->getLesCategories();
        return view('produit',compact('lesProduits', 'laCategorie', 'lesCategories'));
    }

}
