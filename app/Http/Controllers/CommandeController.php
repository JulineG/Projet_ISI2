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

    public function getInfos(){
        $commande = new CommandeDAO();
        $lesInfos = $commande->getLesInfos();
        $categorie = new AccueilDAO();
        $lesCategories = $categorie->getLesCategories();
        return view('infosCommande', compact('lesInfos', 'lesCategories'));
    }

    public function ajoutCommande(){
        $panier = Session::get('panier');
        foreach ($panier as $produit) {
            $produitCommande = new Commande();
            $produitCommande->setIdProduit($produit[0]);
            $produitCommande->setQuantite($produit[1]);

        }
        $commande = new Commande();
        $commande->setIdClient(Auth::id());
        $commande->setDateCommande(new Date());
        $maCommandeDAO=new CommandeDAO();
        $maCommandeDAO->creationCommande($produitCommande,$commande);
        return view('insertionOK');
    }
}
