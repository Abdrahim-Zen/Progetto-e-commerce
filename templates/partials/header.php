<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?= $this->e($base_url) ?>">
            <i class="bi bi-controller me-2"></i>
            <?= $this->e($site_name) ?>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= $this->e($base_url) ?>">
                        <i class="bi bi-house me-1"></i>Home
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-tags me-1"></i>Categorie
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Manga</a></li>
                        <li><a class="dropdown-item" href="#">Card Game</a></li>
                        <li><a class="dropdown-item" href="#">Figure</a></li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-nav">
                <a class="nav-link" href="index.php?action=cart&cart_action=showCart">
                    <i class="bi bi-cart3"></i>
                    <span class="badge bg-primary rounded-pill">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            $db = new Database();
                            echo $db->getCartCount($_SESSION['user_id']);
                        } else {
                            echo '0';
                        }
                        ?>
                    </span>
                </a>

                <?php if (isset($user) && $user): ?>
                    <!-- Se l'utente è loggato -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>
                            <?= $this->e($user['name']) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">


                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="auth.php?action=handleLogout">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <!-- Se l'utente NON è loggato -->
                    <a class="nav-link" href="auth.php?action=showLogin">
                        <i class="bi bi-person me-1"></i> Account
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>