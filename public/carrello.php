<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controllers/CarrelloController.php';

$action = $_GET['action'] ?? 'showCart';
$controller = new CarelloController();

switch ($action) {
    case 'addToCart':
        $controller->addToCart();
        break;
    case 'showCart':
        $controller->showCart();
        break;
    case 'removeFromCart':
        $controller->removeFromCart();
        break;
    case 'updateQuantity':
        $controller->updateQuantity();
        break;
    default:
        $controller->showCart();
        break;
}