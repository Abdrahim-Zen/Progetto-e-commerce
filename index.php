<?php
require_once __DIR__ . '../vendor/autoload.php';
require_once __DIR__ . '../controllers/HomepageController.php';

try {
    $controller = new HomepageController();
    $controller->display();
} catch (Exception $e) {
    http_response_code(500);
    echo "<h1>Errore del Server</h1>";
    echo "<p>Si è verificato un errore imprevisto.</p>";
    error_log("Errore applicazione: " . $e->getMessage());
}
