<?php
require_once __DIR__ . '/../controllers/prodottoSingoloController.php';

// Ottieni l'ID del prodotto dalla query string
$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($productId <= 0) {
    // Reindirizza alla homepage se l'ID non è valido
    header('Location: index.php');
    exit;
}

$controller = new prodottoSingoloController();
$controller->display($productId);
?>