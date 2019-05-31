<?php

namespace App\Http\Controllers;

use App\Modeles\AccueilDAO;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    //
    public function getCategories(){
        $categorie = new AccueilDAO();
        $lesCategories = $categorie->getLesCategories();
        return view('accueil',compact('lesCategories'));
    }

}
