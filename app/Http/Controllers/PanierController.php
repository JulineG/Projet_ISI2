<?php

namespace App\Http\Controllers;

use App\Modeles\AccueilDAO;
use App\Modeles\ProduitDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{
    //
    function ajouterPanier($id, Request $request){
        $exist = false;
        $qty=$request->input('qty');
        if(Session::has('panier')){
            $value = Session::get('panier');

            foreach ($value as $val){
                if($val[0]==$id){
                    $panier[] = array($val[0],$val[1]+$qty);
                    $exist = true;
                }else {
                    $panier[]=$val;
                }
            }

            if($exist){
                Session::put('panier', $panier);
            } else {
                $value[]=array($id, $qty);
                Session::put('panier', $value);
            }


        }else {
            $panier= array(array($id,$qty));
            Session::put('panier', $panier);
        }
        $categorie = new AccueilDAO();
        $lesCategories = $categorie->getLesCategories();
        return view('accueil', compact('lesCategories'));
    }

    static function getContenuPanier(){
        $lesProduits=array();
        $quantite = array();
        $lePanier=array();
        $indice = 0;
        $produit = new ProduitDAO();
        if(Session::has('panier')){
            $panier = Session::get('panier');
            foreach ($panier as $unProduit){
                $idprod=$unProduit[0];
                $lesProduits[$indice]=$produit->getUnProduit($idprod);
                $quantite[$indice]=$unProduit[1];
                $lePanier[] = array($lesProduits[$indice],$quantite[$indice]);
                $indice++;
            }
        }
        return $lePanier;

    }

    function getPanier(){
        $lePanier = $this->getContenuPanier();
        $prixTotal=0;
        foreach ($lePanier as $panier){
            $prixTotal  += $panier[0]->getPrix()*$panier[1];
        }
        $categorie = new AccueilDAO();
        $lesCategories = $categorie->getLesCategories();
        return view('panier', compact('lePanier','prixTotal', 'lesCategories'));
    }

    function supprimerPanier($id){
        $value = Session::get('panier');

        foreach ($value as $val){
            if($val[0]!=$id) {
                $panier[] = $val;
            }
        }

        if(empty($panier)){
            Session::remove('panier');
        }else {
            Session::put('panier', $panier);
        }

        return redirect()->action('PanierController@getPanier');
    }
}
