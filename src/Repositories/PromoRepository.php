<?php

namespace src\Repositories;

use PDO;
use PDOException;
use src\Models\Promo;
use src\Models\Database;

class PromoRepository
{
    private $DB;

    public function __construct()
    {
        $database = new Database;
        $this->DB = $database->getDB();

        require_once __DIR__ . '/../../config.php';
    }


    public function insertPromo($Nom, $Date_debut, $Date_fin, $Nombre_apprenants)
    {

        $database = new Database();

        $query = $database->getDB()->prepare('
            INSERT INTO ' . PREFIXE . 'promo (Nom, Date_debut, Date_fin, Nombre_apprenants) 
            VALUES (:Nom, :Date_debut, :Date_fin, :Nombre_apprenants)
        ');

        $query->execute([
            'Nom' => $Nom,
            'Date_debut' => $Date_debut,
            'Date_fin' => $Date_fin,
            'Nombre_apprenants' => $Nombre_apprenants,
        ]);
    }

    public function getLastInsertedId()
    {
        return $this->DB->lastInsertId();
    }

    public function getAllPromotions()
    {
        try {
            $query = $this->DB->query('SELECT * FROM ' . PREFIXE . 'promo');
            $promotions = $query->fetchAll(PDO::FETCH_ASSOC);
    
            $promoObjects = [];
            foreach ($promotions as $promotion) {
                $promo = new Promo(
                    $promotion['ID_promo'],
                    $promotion['Nom'],
                    $promotion['Date_debut'],
                    $promotion['Date_fin'],
                    $promotion['Nombre_apprenants']
                );
                $promoObjects[] = $promo;
            }
    
            return $promoObjects;
        } catch (PDOException $e) {
            return []; 
        }
    }
}
