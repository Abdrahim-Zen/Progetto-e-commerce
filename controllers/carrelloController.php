<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../vendor/autoload.php';

class CarelloController
{
    private $templates;
    private $db;

    public function __construct()
    {
        $this->templates = new League\Plates\Engine(__DIR__ . '/../templates');
        $this->db = new Database();
    }

    // Aggiungi prodotto al carrello
    public function addToCart()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: auth.php?action=showLogin&message=Devi+accedere+per+aggiungere+al+carrello');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'] ?? null;
            $quantity = $_POST['quantity'] ?? 1;

            if (!$product_id) {
                header('Location: prodottoSingolo.php?id=' . $product_id . '&message=Prodotto+non+valido');
                exit;
            }

            $success = $this->db->addToCart($_SESSION['user_id'], $product_id, $quantity);

            if ($success) {
                header('Location: prodottoSingolo.php?id=' . $product_id . '&message=Prodotto+aggiunto+al+carrello');
            } else {
                header('Location: prodottoSingolo.php?id=' . $product_id . '&message=Errore+nell+aggiunta+al+carrello');
            }
            exit;
        }
    }

    // Mostra il carrello
    public function showCart()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: auth.php?action=showLogin&message=Devi+accedere+per+vedere+il+carrello');
            exit;
        }

        $cart_items = $this->db->getCartItems($_SESSION['user_id']);
        $total = 0;

        foreach ($cart_items as $item) {
            $total += $item['prezzo'] * $item['quantita'];
        }

        $data = [
            'title' => 'Carrello - Manga Xeno',
            'cart_items' => $cart_items,
            'total' => $total
        ];

        echo $this->templates->render('carrello', $data);
    }

    // Rimuovi prodotto dal carrello
    public function removeFromCart()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: auth.php?action=showLogin');
            exit;
        }

        $product_id = $_GET['product_id'] ?? null;
        
        if ($product_id) {
            $this->db->removeFromCart($_SESSION['user_id'], $product_id);
        }

        header('Location: carrello.php?action=showCart');
        exit;
    }

    // Aggiorna quantità
    public function updateQuantity()
    {
        if (!isset($_SESSION['user_id'])) {
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'] ?? null;
            $quantity = $_POST['quantity'] ?? 1;

            if ($product_id) {
                $this->db->updateCartQuantity($_SESSION['user_id'], $product_id, $quantity);
            }
        }

        header('Location: carrello.php?action=showCart');
        exit;
    }
}