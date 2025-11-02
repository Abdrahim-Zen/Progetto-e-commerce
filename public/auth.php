<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controllers/LoginController.php';

$action = $_GET['action'] ?? 'showLogin';
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
} else {
    header('Location: auth.php?action=showLogin');
}