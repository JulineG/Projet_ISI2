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

    function getPanier(){
        $lesProduits=array();
        $quantite = array();
        $lePanier=array();
        $prixTotal=0;
        $indice = 0;
        $produit = new ProduitDAO();
        if(Session::has('panier')){
            $panier = Session::get('panier');
            foreach ($panier as $unProduit){
                $idprod=$unProduit[0];
                $lesProduits[$indice]=$produit->getUnProduit($idprod);
                $quantite[$indice]=$unProduit[1];
                $prixTotal += $lesProduits[$indice]->getPrix()*$quantite[$indice];
                $lePanier[] = array($lesProduits[$indice],$quantite[$indice]);
                $indice++;
            }
        }
        $categorie = new AccueilDAO();
        $lesCategories = $categorie->getLesCategories();
        return view('panier', compact('quantite','lePanier','prixTotal','lesProduits', 'lesCategories'));
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
