<?php
namespace src\Models;

final class cours {
    public $ID_cours;
    public $Nom;
    public $Jour;
    public $Heure_debut;
    public $Heure_fin;
    public $Code;

public function __construct(int $ID_cours, string $Nom, $Jour, $Heure_debut, $Heure_fin, $Code)
{
    $this->ID_cours = $ID_cours;        
    $this->Nom = $Nom;
    $this->Jour = $Jour;
    $this->Heure_debut = $Heure_debut;
    $this->Heure_fin = $Heure_fin;
    $this->Code = $Code;
}

public function getId(): int 
{
    return $this->ID_cours;
}

public function getNom(): string
{
    return $this->Nom;
}
public function setNom($Nom)
{
    $this->Nom = $Nom;
}
public function getJour(): string
{
    return $this->Jour;
}
public function setJour($Jour)
{
    $this->Jour = $Jour;
}
public function getHeure_debut(): string
{
    return $this->Heure_debut;
}
public function setHeure_debut($Heure_debut)
{
    $this->Heure_debut = $Heure_debut;
}
public function getHeure_fin(): string
{
    return $this->Heure_fin;
}
public function setHeure_fin($Heure_fin)
{
    $this->Heure_fin = $Heure_fin;
}
public function getCode(): string
{
    return $this->Code;
}
public function setCode($Code)
{
    $this->Code = $Code;
}
}
