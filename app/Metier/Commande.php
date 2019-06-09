<?php
namespace App\Metier;
class Commande
{
    private $idCommande;
    private $idProduit;
    private $id;
    private $quantite;
    private $idClient;
    private $dateCommande;

    public function getIdProduit()
    {
        return $this->idProduit;
    }
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }
    public function getIdCommande()
    {
        return $this->idCommande;
    }
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id= $id;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }
    public function setQuantite($quantite)
    {
        $this->quantite= $quantite;
    }
    public function getIdClient()
    {
        return $this->idClient;
    }
    public function setIdClient($idClient)
    {
        $this->idClient= $idClient;
    }
    public function getDateCommande()
    {
        return $this->dateCommande;
    }
    public function setDateCommande($dateCommande)
    {
        $this->dateCommande= $dateCommande;
    }

}
