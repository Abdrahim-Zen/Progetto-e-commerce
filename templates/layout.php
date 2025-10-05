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
    <!-- Header -->
    <?= $this->fetch('partials/header') ?>

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