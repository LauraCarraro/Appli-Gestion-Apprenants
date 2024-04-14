<?php
namespace src\Models;

final class utilisateur 
{
    public $ID_utilisateur;
    public $Nom;
    public $Prenom;
    public $Email;
    public $Motdepasse;


public function __construct($ID_utilisateur, $Nom, $Prenom, $Email, $Motdepasse){
    $this->ID_utilisateur = $ID_utilisateur;
    $this->Nom = $Nom;
    $this->Prenom = $Prenom;
    $this->Email = $Email;
    $this->Motdepasse = $Motdepasse;
}

public function getID_utilisateur(): int
{
  return $this->ID_utilisateur;
}

public function getNom(): string
{
  return $this->Nom;
}
public function setNom($Nom)
{
  $this->Nom = $Nom;
}

public function getPrenom(): string
{
  return $this->Prenom;
}
public function setPrenom($Prenom)
{
  $this->Prenom = $Prenom;
}

public function getEmail(): string
{
  return $this->Email;
}
public function setEmail($Email)
{
  $this->Email = $Email;
}

public function getMotdepasse(): string
{
  return $this->Motdepasse;
}
public function setMotdepasse($Motdepasse)
{
  $this->Motdepasse = $Motdepasse;
}
}          



