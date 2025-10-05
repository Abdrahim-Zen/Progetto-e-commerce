<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php';

class prodottoSingoloController{ 
    private $templates;
    private $db; 
    public function __construct() {
        try {
            // Inizializza Plates
            $this->templates = new League\Plates\Engine(__DIR__ . '/../templates');
            
            // Aggiungi dati globali a tutti i template
            $this->templates->addData([
                'base_url' => '/Progetto/public/',
                'site_name' => 'Manga Xeno',
                'current_year' => date('Y')
            ]);
            
            // Connessione al database
            $this->db = new Database();
            
        } catch (Exception $e) {
            die("Errore inizializzazione: " . $e->getMessage());
        }
    }

    public function getProdottoData(){

    }

    

}