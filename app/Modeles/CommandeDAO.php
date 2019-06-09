<?php

namespace App\Modeles;

use App\Http\Controllers\PanierController;

use App\Metier\Commande;

use Illuminate\Support\Facades\DB;

class CommandeDAO extends DAO
{
    public function creationCommande(Commande $produitCommande, Commande $uneCommande ){
        DB::table('commande')->insert(['idClient'=>$uneCommande->getIdClient(),'dateCommande'=>$uneCommande->getDateCommande()]);
        $lastCommande = DB::table('commande')->orderBy('idCommande')->first();
        $idCommande=$lastCommande->idCommande;
        DB::table('produitCommande')->insert(['idCommande'=>$idCommande,'idProduit'=>$produitCommande->getIdProduit(),'quantite'=>$produitCommande->getQuantite()]);
    }

    public function getCommande($id){
        $maCommande = DB::table('produitscommande')->join('commande', 'produitscommande.idCommande','=','commande.idCommande')->where('produitscommandeid','=',$id)->get();
        $lesProduits = array();
        foreach ($maCommande as $monProduit){
            $id = $monProduit->id;
            $lesProduits[$id]= $this->creerObjetMetier($monProduit);
        }
        return $lesProduits;
    }

    public function getLesInfos(){
        $panier = PanierController::getContenuPanier();
        $infos = array( 'nom'=> auth()->user()->name,
                        'prenom'=>auth()->user()->firstname,
                        'adresse'=>auth()->user()->address,
                        'ville'=>auth()->user()->city,
                        'codePostal'=>auth()->user()->postcode,
                        'email'=>auth()->user()->email,
                        'panier'=>$panier);
        return $infos;
    }

    protected function creerObjetMetier(\stdClass $objet)
    {
        $laCommande = new Commande();
        $laCommande->setId($objet->id);
        $laCommande->setIdCommande($objet->idCommande);
        $laCommande->setIdClient($objet->idClient);
        $laCommande->setIdProduit($objet->idProduit);
        $laCommande->setDateCommande($objet->dateCommande);
        $laCommande->setQuantite($objet->quantite);

        return $laCommande;
    }
}
