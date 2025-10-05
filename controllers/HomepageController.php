<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';

class HomepageController {
    private $db;
    private $templates;
    
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
    
    public function getHomepageData() {
        try {
            $novitaProducts = $this->db->getProductsByCategory('novita', 8);
            $cardGameProducts = $this->db->getProductsByCategory('cardgame', 4);
            $figureProducts = $this->db->getProductsByCategory('figure', 4);
            
            return [
                'title' => 'Homepage - Mio Shop',
                'novita_products' => $novitaProducts,
                'cardgame_products' => $cardGameProducts,
                'figure_products' => $figureProducts,
                'has_products' => !empty($novitaProducts) || !empty($cardGameProducts) || !empty($figureProducts)
            ];
            
        } catch (Exception $e) {
            error_log("Errore caricamento dati: " . $e->getMessage());
            return [
                'title' => 'Homepage - Mio Shop',
                'novita_products' => [],
                'cardgame_products' => [],
                'figure_products' => [],
                'has_products' => false,
                'error' => 'Errore nel caricamento dei prodotti'
            ];
        }
    }
    
    public function render() {
        $data = $this->getHomepageData();
        return $this->templates->render('homepage', $data);
    }
    
    public function display() {
        try {
            echo $this->render();
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
?>