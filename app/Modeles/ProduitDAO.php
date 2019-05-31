<?php

namespace App\Modeles;

use App\Metier\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProduitDAO extends Model
{
    //
    public function getLesProduits($id)
    {
        $produit = DB::table('produit')->where('idCat', '=', $id)->get();
        $lesProduits = array();
        foreach ($produit as $leProduit) {
            $idProduit = $leProduit->idProduit;
            $lesProduits[$idProduit] = $this->creerObjetMetier($leProduit);
        }
        return $lesProduits;
    }


    protected function creerObjetMetier(\stdClass $objet)
    {
        $leProduit = new Produit();
        $leProduit->setIdProduit($objet->idProduit);
        $leProduit->setIdCat($objet->idCat);
        $leProduit->setNomProduit($objet->nomProduit);
        $leProduit->setDescription($objet->description);
        $leProduit->setPrix($objet->prix);
        $leProduit->setImage($objet->image);
        /**$produitDAO = new ProduitDAO();
        $lesProduits = $produitDAO->getLesProduits($objet->idCat);
        if($lesProduits){
        $leProduit->setLesProduits($lesProduits);
        }
        else
        $leProduit->setLesProduits(null);**/
        return $leProduit;
    }
}
