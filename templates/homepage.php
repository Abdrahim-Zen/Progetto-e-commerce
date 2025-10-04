<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

<!-- Hero Section -->
<section class="hero bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold">Benvenuto nel nostro Shop</h1>
                <p class="lead">Scopri le ultime novità in manga, card game e figure collezionabili</p>
            </div>
            <div class="col-lg-6 text-center">
                <i class="bi bi-shop-window display-1"></i>
            </div>
        </div>
    </div>
</section>

<!-- Products Sections -->
<div id="products">
    <!-- Novità Section -->
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">🔥 Ultime Novità</h2>
                <a href="#" class="btn btn-outline-primary">Vedi tutto</a>
            </div>

            <div class="row g-4">
                <?php if (!empty($novita_products)): ?>
                    <?php foreach ($novita_products as $product): ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="card h-100 product-card shadow-sm">
                                <div class="position-relative">
                                    <span class="badge bg-danger position-absolute top-0 start-0 m-2">Novità</span>
                                    <img src="<?= $this->e($product['immagine']) ?>" class="card-img-top" alt="<?= $this->e($product['nome']) ?>">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= $this->e($product['nome']) ?></h5>
                                    <p class="card-text flex-grow-1"><?= $this->e($product['descrizione'] ?? 'Descrizione non disponibile') ?></p>
                                    <div class="mt-auto">
                                        <div class="price h4 text-primary mb-3">€<?= number_format($product['prezzo'], 2) ?></div>
                                        <div class="d-grid">
                                            <a href="prodotto.php?id=<?= $this->e($product['ID']) ?>" class="btn btn-primary">Dettagli</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-inbox display-1"></i>
                            <h3>Nessuna novità al momento</h3>
                            <p>Torna presto per scoprire le nuove arriv!</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Altre sezioni prodotti (mantieni il resto del codice) -->
    <!-- ... -->
</div>

<?php $this->stop() ?>

<?php $this->start('page_scripts') ?>
<script>
    // JavaScript personalizzato per la homepage
    document.addEventListener('DOMContentLoaded', function() {
        // Animazioni per le card prodotti
        const productCards = document.querySelectorAll('.product-card');

        productCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.transition = 'transform 0.3s ease';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    });
</script>
<?php $this->stop() ?>