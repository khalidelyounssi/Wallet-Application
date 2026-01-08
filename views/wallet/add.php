<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="row justify-content-center mt-4">
    <div class="col-md-5">
        <div class="card card-custom p-4">
            <div class="text-center mb-4">
                <div class="icon-box bg-success bg-opacity-10 text-success mx-auto mb-3" style="width: 60px; height: 60px; border-radius: 50%;">
                    <i class="fas fa-wallet fa-2x"></i>
                </div>
                <h4 class="fw-bold">Ajouter du Solde</h4>
            </div>

            <form action="index.php?action=add_budget" method="POST">
                <div class="mb-4">
                    <label class="form-label small fw-bold text-secondary">MONTANT (DH)</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-light border-0"><i class="fas fa-plus text-success"></i></span>
                        <input type="number" name="amount" class="form-control bg-light border-0 fw-bold" placeholder="0.00" step="0.01" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-custom w-100 py-3">Confirmer l'ajout</button>
                <a href="index.php?action=dashboard" class="btn btn-link text-muted w-100 mt-2 text-decoration-none">Annuler</a>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>