<?php
namespace src\Models;
use src\Services\Hydratation;

final class promo 
{
    public $ID_promo;
    public $Nom;
    public $Date_debut;
    public $Date_fin;
    public $Nombre_apprenants;

use Hydratation;

public function __construct($ID_promo, $Nom, $Date_debut, $Date_fin, $Nombre_apprenants)
{ 
    $this->ID_promo = $ID_promo;
    $this->Nom = $Nom;
    $this->Date_debut = $Date_debut;
    $this->Date_fin = $Date_fin;
    $this->Nombre_apprenants = $Nombre_apprenants; 
}

public function getId()
{
    return $this->ID_promo;              
}
public function getNom()
{
    return $this->Nom;
}
public function setNom($Nom)
{
    $this->Nom = $Nom;
}
public function getDateDebut()
{
    return $this->Date_debut;
}
public function setDateDebut($Date_debut)
{
    $this->Date_debut = $Date_debut;
}
public function getDateFin()
{
    return $this->Date_fin;
}
public function setDateFin($Date_fin)
{
    $this->Date_fin = $Date_fin;
}
public function getNombreApprenants()
{
    return $this->Nombre_apprenants;
}
public function setNombreApprenants($Nombre_apprenants)
{
    $this->Nombre_apprenants = $Nombre_apprenants;
}
}
