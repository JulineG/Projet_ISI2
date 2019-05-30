<?php

namespace App\Modeles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Metier\Categorie;

class AccueilDAO extends DAO
{
    //
    public function getLesCategories()
    {
        $categorie = DB::table('categorie')->get();
        $lesCategories = array();
        foreach ($categorie as $laCategorie) {
            $idCat = $laCategorie->idCat;
            $lesCategories[$idCat] = $this->creerObjetMetier($laCategorie);
        }
        return $lesCategories;
    }

    protected function creerObjetMetier(\stdClass $objet)
    {
        $laCategorie = new Categorie();
        $laCategorie->setIdCat($objet->idCat);
        $laCategorie->setNomCat($objet->nomCat);
        /**$produitDAO = new ProduitDAO();
        $lesProduits = $produitDAO->getLesProduits($objet->idCat);
        if($lesProduits){
            $laCategorie->setLesProduits($lesProduits);
        }
        else
            $laCategorie->setLesProduits(null);**/
        return $laCategorie;
    }

}
