<footer class="bg-dark text-white py-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">
                    <i class="bi bi-controller me-2"></i><?=$this->e($site_name)?>
                </h5>
                <p class="text-muted">Il tuo negozio di fiducia per manga, card game e figure collezionabili.</p>
                <div class="social-links">
                    <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
            
            <div class="col-md-2 mb-3">
                <h6>Link veloci</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-muted text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Prodotti</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Contatti</a></li>
                </ul>
            </div>
            
            <div class="col-md-3 mb-3">
                <h6>Categorie</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-muted text-decoration-none">Manga</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Card Game</a></li>
                    <li><a href="#" class="text-muted text-decoration-none">Figure</a></li>
                </ul>
            </div>
            
            <div class="col-md-3 mb-3">
                <h6>Contatti</h6>
                <ul class="list-unstyled text-muted">
                    <li><i class="bi bi-envelope me-2"></i>info@mioshop.it</li>
                    <li><i class="bi bi-telephone me-2"></i>+39 123 456 7890</li>
                    <li><i class="bi bi-geo-alt me-2"></i>Via Example 123, Milano</li>
                </ul>
            </div>
        </div>
        
        <hr class="my-4">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-muted mb-0">&copy; <?=$this->e($current_year)?> <?=$this->e($site_name)?>. Tutti i diritti riservati.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-muted text-decoration-none me-3">Privacy Policy</a>
                <a href="#" class="text-muted text-decoration-none">Termini di Servizio</a>
            </div>
        </div>
    </div>
</footer>