<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $this->e($title) ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->

    <?= $this->section('extra_styles') ?>
</head>

<body>
    <?php
    // Avvia la sessione se non è già attiva
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Prepara i dati per l'header - usa valori di default
    $base_url = 'index.php';
    $site_name = 'Manga Xeno';
    
    // Prepara dati utente
    $user = null;
    if (isset($_SESSION['user_id'])) {
        $user = [
            'id' => $_SESSION['user_id'],
            'name' => $_SESSION['user_name'] ?? 'Utente',
            'email' => $_SESSION['user_email'] ?? ''
        ];
    }
    ?>

    <!-- Header -->
    <?= $this->fetch('partials/header', [
        'base_url' => $base_url,
        'site_name' => $site_name, 
        'user' => $user
    ]) ?>

    <!-- Main Content -->
    <main>
        <?= $this->section('main_content') ?>
    </main>

    <!-- Footer -->
    <?= $this->fetch('partials/footer') ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    <?= $this->section('page_scripts') ?>
</body>

</html>