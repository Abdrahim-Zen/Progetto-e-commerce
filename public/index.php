<?php
// Attiva error reporting per debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'home':
        require_once __DIR__ . '/../controllers/HomepageController.php';
        $controller = new HomepageController();
        $controller->display();
        break;

    case 'showLogin':
    case 'handleLogin':
    case 'showRegister':
    case 'handleRegister':
    case 'handleLogout':
        require_once __DIR__ . '/../controllers/LoginController.php';
        $controller = new LoginController();
        
        if ($action === 'showLogin') {
            $controller->showLogin();
        } elseif ($action === 'handleLogin') {
            $controller->handleLogin();
        } elseif ($action === 'showRegister') {
            $controller->showRegister();
        } elseif ($action === 'handleRegister') {
            $controller->handleRegister();
        } elseif ($action === 'handleLogout') {
            $controller->handleLogout();
        }
        break;

    case 'prodotto':
        $id = $_GET['id'] ?? null;
        if ($id) {
            require_once __DIR__ . '/../controllers/ProdottoSingoloController.php';
            $controller = new ProdottoSingoloController();
            $controller->display($id);
        } else {
            header('Location: index.php?action=home');
        }
        break;

    // AGGIUNGI QUESTO CASE PER IL CARRELLO
    case 'cart':
        require_once __DIR__ . '/../controllers/CarrelloController.php';
        $cartController = new CarelloController();
        
        $cartAction = $_GET['cart_action'] ?? 'showCart';
        
        if ($cartAction === 'addToCart') {
            $cartController->addToCart();
        } elseif ($cartAction === 'showCart') {
            $cartController->showCart();
        } elseif ($cartAction === 'removeFromCart') {
            $cartController->removeFromCart();
        } elseif ($cartAction === 'updateQuantity') {
            $cartController->updateQuantity();
        } else {
            $cartController->showCart();
        }
        break;

    default:
        require_once __DIR__ . '/../controllers/HomepageController.php';
        $controller = new HomepageController();
        $controller->display();
        break;
}