<?php $this->layout('layout', ['title' => $title]) ?>
<?php $this->start('extra_styles') ?>
<link rel="stylesheet" href="templates\css\styles.css">
<?php $this->stop() ?>

<?php $this->start('main_content') ?>
 <!-- Product section - Stile simil Mangayo -->
<section class="py-4">
    <div class="container">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=$this->e($base_url)?>" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="<?=$this->e($base_url)?>" class="text-decoration-none">Manga</a></li>
                <li class="breadcrumb-item active"><?= $this->e($prodotto['nome']) ?></li>
            </ol>
        </nav>

        <div class="row">
            <!-- Colonna Immagine -->
            <div class="col-md-5 mb-4">
                <div class="product-image-container position-relative">
                    <img class="img-fluid w-100 " 
                         src="<?= $this->e($prodotto['image']) ?>" 
                         alt="<?= $this->e($prodotto['nome']) ?>" 
                         style="max-height: 600px; object-fit: contain;" />
                </div>
            </div>

            <!-- Colonna Dettagli -->
            <div class="col-md-7">
                <div class="product-details">
                    <!-- Codice e Categoria -->
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <small class="text-muted">CODICE: <?= $this->e($prodotto['codice']) ?></small>
                        
                    </div>

                    <!-- Titolo -->
                    <h1 class="h2 fw-bold mb-3"><?= $this->e($prodotto['nome']) ?></h1>

                    <!-- Volume -->
                    <?php if (isset($prodotto['volume'])): ?>
                        <div class="mb-3">
                            <strong class="text-dark">Volume: </strong>
                            <span class="fs-5"><?= $this->e($prodotto['volume']) ?></span>
                        </div>
                    <?php endif; ?>

                    <!-- Prezzo -->
                    <div class="price-section mb-4">
                        <div class="h3 text-primary fw-bold mb-2">
                            € <?= number_format($prodotto['prezzo'], 2, ',', '.') ?>
                        </div>
                        <small class="text-success">
                            <i class="bi bi-check-circle-fill"></i> Disponibile  
                        </small>
                    </div>

                    <!-- Descrizione -->
                    <div class="description mb-4">
                        <h5 class="fw-semibold mb-3">Descrizione</h5>
                        <p class="text-muted lh-lg">
                            <?= isset($prodotto['descrizione']) && !empty($prodotto['descrizione']) 
                                ? $this->e($prodotto['descrizione']) 
                                : 'Scopri le avventure incredibili in questo volume. Una storia appassionante che ti terrà incollato alla pagina fino alla fine.' ?>
                        </p>
                    </div>

                    <!-- Acquisto -->
                    <div class="purchase-section border-top pt-4">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <label for="quantity" class="form-label fw-semibold">Quantità:</label>
                            </div>
                            <div class="col-auto">
                                <div class="input-group" style="width: 120px;">
                                    <button class="btn btn-outline-secondary" type="button" id="decrease-qty">-</button>
                                    <input type="number" class="form-control text-center" 
                                           id="quantity" value="1" min="1" max="10">
                                    <button class="btn btn-outline-secondary" type="button" id="increase-qty">+</button>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-danger btn-lg w-100 py-3 fw-bold">
                                    <i class="bi bi-cart-plus me-2"></i>
                                    AGGIUNGI AL CARRELLO
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Info aggiuntive -->
                    <div class="product-info mt-4 pt-3 border-top">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="text-muted">
                                    <i class="bi bi-truck fs-4 d-block mb-2"></i>
                                    <small>Spedizione gratuita<br>oltre €50</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-muted">
                                    <i class="bi bi-arrow-clockwise fs-4 d-block mb-2"></i>
                                    <small>Reso facile<br>entro 30 giorni</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-muted">
                                    <i class="bi bi-shield-check fs-4 d-block mb-2"></i>
                                    <small>Pagamento<br>sicuro</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Fancy Product</h5>
                                <!-- Product price-->
                                $40.00 - $80.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Special Item</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$20.00</span>
                                $18.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Sale Item</h5>
                                <!-- Product price-->
                                <span class="text-muted text-decoration-line-through">$50.00</span>
                                $25.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">Popular Item</h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                $40.00
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript per la quantità -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityInput = document.getElementById('quantity');
    const decreaseBtn = document.getElementById('decrease-qty');
    const increaseBtn = document.getElementById('increase-qty');

    decreaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });

    increaseBtn.addEventListener('click', function() {
        let currentValue = parseInt(quantityInput.value);
        if (currentValue < 10) {
            quantityInput.value = currentValue + 1;
        }
    });
});
</script>

<?php $this->stop() ?>