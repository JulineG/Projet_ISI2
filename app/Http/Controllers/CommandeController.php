<?php

namespace App\Http\Controllers;

use App\Metier\Commande;
use App\Modeles\AccueilDAO;
use App\Modeles\CommandeDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;

class CommandeController extends Controller
{
    //
    public function checkAuth(){
        if(auth()->check()){
            return redirect('infosCommande');
        }else {
            return redirect('connexion');
        }
    }

    public function identification(){
        Session::put('id', true);
        $categorie = new AccueilDAO();
        $lesCategories = $categorie->getLesCategories();
        return view('identification', compact('lesCategories'));
    }

    public function getInfos(){
        $commande = new CommandeDAO();
        $lesInfos = $commande->getLesInfos();
        $categorie = new AccueilDAO();
        $lesCategories = $categorie->getLesCategories();
        return view('infosCommande', compact('lesInfos', 'lesCategories'));
    }

    public function ajoutCommande(){
        $panier = Session::get('panier');
        $mesProduits = array();
        foreach ($panier as $produit) {
            $monProduit= new Commande();
            $monProduit->setIdProduit($produit[0]);
            $monProduit->setQuantite($produit[1]);
            $mesProduits[] = $monProduit;
        }
        $commande = new Commande();
        $commande->setIdClient(Auth::id());
        $commande->setDateCommande(now());
        $maCommandeDAO=new CommandeDAO();
        $maCommandeDAO->creationCommande($mesProduits,$commande);
        $categorie = new AccueilDAO();
        $lesCategories = $categorie->getLesCategories();
        Session::remove('panier');
        return view('insertionOK', compact('lesCategories'));
    }
}
