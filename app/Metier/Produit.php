<?php
namespace App\Metier;
class Produit
{
    private $idProduit;
    private $idCat;
    private $nomProduit;
    private $description;
    private $prix;
    private $image;

    public function getIdProduit()
    {
        return $this->idProduit;
    }
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }
    public function getIdCat()
    {
        return $this->idCat;
    }
    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;
    }
    public function getNomProduit()
    {
        return $this->nomProduit;
    }
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit= $nomProduit;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description= $description;
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function setPrix($prix)
    {
        $this->prix= $prix;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image= $image;
    }

}
