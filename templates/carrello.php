<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
<div class="container mt-4">
    <h1 class="mb-4">Il tuo carrello</h1>

    <?php if (!empty($cart_items)): ?>
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($cart_items as $item): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="<?= $this->e($item['image']) ?>" class="img-fluid rounded" alt="<?= $this->e($item['nome']) ?>">
                                </div>
                                <div class="col-md-4">
                                    <h5 class="card-title"><?= $this->e($item['nome']) ?></h5>
                                    <p class="text-muted mb-0">Codice: <?= $this->e($item['codice']) ?></p>
                                    <?php if (isset($item['tipo_prodotto'])): ?>
                                        <small class="badge bg-secondary"><?= $this->e($item['tipo_prodotto']) ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-2">
                                    <p class="h5">€ <?= number_format($item['prezzo'], 2) ?></p>
                                </div>
                                <div class="col-md-2">
                                    <form action="index.php?action=cart&cart_action=updateQuantity" method="POST" class="d-inline">
                                        <input type="number" name="quantity" value="<?= $item['quantita'] ?>" 
                                               min="1" max="10" class="form-control" 
                                               onchange="this.form.submit()">
                                        <input type="hidden" name="product_id" value="<?= $item['prodotto_id'] ?>">
                                    </form>
                                </div>
                                <div class="col-md-2">
                                    <p class="h5">€ <?= number_format($item['prezzo'] * $item['quantita'], 2) ?></p>
                                    <a href="index.php?action=cart&cart_action=removeFromCart&product_id=<?= $item['prodotto_id'] ?>" 
                                       class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Riepilogo ordine</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Totale:</span>
                            <span class="h5 text-primary">€ <?= number_format($total, 2) ?></span>
                        </div>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-primary btn-lg">Procedi all'acquisto</a>
                            <a href="index.php?action=home" class="btn btn-outline-primary">Continua lo shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <i class="bi bi-cart-x display-1 text-muted"></i>
            <h3 class="mt-3">Il tuo carrello è vuoto</h3>
            <p class="text-muted">Aggiungi alcuni prodotti fantastici al tuo carrello!</p>
            <a href="index.php?action=home" class="btn btn-primary btn-lg">Inizia lo shopping</a>
        </div>
    <?php endif; ?>
</div>
<?php $this->stop() ?>