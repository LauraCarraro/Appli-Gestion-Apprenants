<?php

namespace src\Models;

use PDO;
use PDOException;

final class Database
{
    private $DB;
    private $config;

    public function __construct()
    {
        $this->config = __DIR__ . '/../../config.php';
        require_once $this->config;

        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $this->DB = new PDO($dsn, DB_USER, DB_PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $error) {
            echo "Erreur de connexion à la Base de Données : " . $error->getMessage();
        }
    }
    
    public function getDB(): PDO
    {
        return $this->DB;
    }

    public function initialisationBDD(): string
    {
        // Vérifier si la base de données est vide
        if ($this->testIfTableUtilisateursExists()) {
            return "La base de données existe déjà.";
        } else {
            try {
                $i = 0;
                $migrationExistante = TRUE;
                while ($migrationExistante === TRUE) {
                    $migration = __DIR__ . "/../Migrations/migration$i.sql";

                     
                    if (file_exists($migration)) {
                        $sql = file_get_contents($migration);
                        $this->DB->query($sql);
                        $i++;
                    } else {
                        $migrationExistante = FALSE;
                    }
                }

                if ($this->UpdateConfig()) {
                    return "La base de données est initialisée !";
                }
            } catch (PDOException $erreur) {
                return "Impossible de remplir la base de données : " . $erreur->getMessage();
            }
        }

        return "Une erreur inattendue s'est produite lors de l'initialisation de la base de données.";
    }

  


    private function testIfTableUtilisateursExists(): bool
    {
        $existant = $this->DB->query('SHOW TABLES FROM ' . DB_NAME . ' like \'%utilisateur%\'')->fetch();

        if ($existant !== false && $existant[0] == PREFIXE . "utilisateur") {
            return true;
        } else {
            return false;
        }
    }


    private function UpdateConfig(): bool
    {

        $fconfig = fopen($this->config, 'w');

        $contenu = "<?php
        
      define('DB_HOST', '" . DB_HOST . "');
      define('DB_NAME', '" . DB_NAME . "');
      define('DB_USER', '" . DB_USER . "');
      define('DB_PWD', '" . DB_PWD . "');
      define('PREFIXE', '" . PREFIXE . "');
      
     
      define('HOME_URL', '" . HOME_URL . "');
      
      
      define('DB_INITIALIZED', TRUE);";


        if (fwrite($fconfig, $contenu)) {
            fclose($fconfig);
            return true;
        } else {
            return false;
        }
    }
}