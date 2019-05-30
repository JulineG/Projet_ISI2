<?php
namespace App\Metier;
class Categorie
{
    private $idCat;
    private $nomCat;

    public function getIdCat()
    {
        return $this->idCat;
    }
    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;
    }
    public function getNomCat()
    {
        return $this->nomCat;
    }
    public function setNomCat($nomCat)
    {
        $this->nomCat= $nomCat;
    }

}
