<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border: none;
        }
        .login-header {
            background-color: #6f42c1;
            color: white;
            border-radius: 10px 10px 0 0 !important;
        }
        .btn-primary {
            background-color: #6f42c1;
            border-color: #6f42c1;
        }
        .btn-primary:hover {
            background-color: #5a32a3;
            border-color: #5a32a3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card login-card">
                    <div class="card-header login-header text-center py-3">
                        <h4 class="mb-0">
                            <i class="bi bi-controller me-2"></i>
                            Manga Xeno
                        </h4>
                        <p class="mb-0 mt-1 opacity-75">Crea il tuo account</p>
                    </div>
                    
                    <div class="card-body p-4">
                        <?php if (!empty($message)): ?>
                            <div class="alert alert-info alert-dismissible fade show">
                                <i class="bi bi-info-circle me-2"></i>
                                <?= $message ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" action="auth.php?action=handleRegister">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nome</label>
                                    <input type="text" name="nome" class="form-control" placeholder="Il tuo nome" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cognome</label>
                                    <input type="text" name="cognome" class="form-control" placeholder="Il tuo cognome" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="la-tua@email.com" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Scegli una password" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                                <i class="bi bi-person-plus me-2"></i>Crea Account
                            </button>
                        </form>
                        
                        <div class="text-center">
                            <p class="mb-2">
                                <a href="auth.php?action=showLogin" class="text-decoration-none">
                                    Hai già un account? Accedi
                                </a>
                            </p>
                            <p class="mb-0">
                                <a href="index.php" class="text-muted text-decoration-none">
                                    <i class="bi bi-arrow-left me-1"></i>Torna alla Home
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>