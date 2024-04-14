<?php
namespace src\Models;

final class role
{
    public $ID_role;
    public $Nom;

public function __construct($ID_role, $Nom) {
    $this->ID_role = $ID_role;
    $this->Nom = $Nom;
}

public function getId()
{
    return $this->ID_role;
}

public function getNom()
{
    return $this->Nom;
}
public function setNom($Nom)
{
    $this->Nom = $Nom;
}
}