<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php';

class prodottoSingoloController{ 
    private $templates;
    private $db; 
    
    public function __construct() {
        try {
            // AVVIA LA SESSIONE PRIMA DI TUTTO
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            // Inizializza Plates
            $this->templates = new League\Plates\Engine(__DIR__ . '/../templates');
            
            // Aggiungi dati globali a tutti i template
            $this->templates->addData([
                'base_url' => 'index.php', // CAMBIATO: rimosso /public/
                'site_name' => 'Manga Xeno',
                'current_year' => date('Y')
            ]);
            
            // Connessione al database
            $this->db = new Database();
            
        } catch (Exception $e) {
            die("Errore inizializzazione: " . $e->getMessage());
        }
    }

    public function getProdottoData($id){
        $prodotto = $this->db->getProductById($id);
        return [
            'title' => $prodotto['nome'] . ' - Manga Xeno',
            'prodotto' => $prodotto,
            'has_prodotto' => !empty($prodotto)
        ];
    }

    public function render($id) {
        $data = $this->getProdottoData($id);
        return $this->templates->render('prodottoSingolo', $data);
    }

    public function display($id) {
        try {
            echo $this->render($id);
        } catch (Exception $e) {
            echo "Errore nel rendering: " . $e->getMessage();
        }
    }
    
    public function __destruct() {
        if ($this->db) {
            $this->db->close();
        }
    }
}