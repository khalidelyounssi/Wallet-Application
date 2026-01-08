<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="row justify-content-center mt-4">
    <div class="col-md-5">
        <div class="card card-custom p-4">
            <div class="text-center mb-4">
                <div class="icon-box bg-danger bg-opacity-10 text-danger mx-auto mb-3" style="width: 60px; height: 60px; border-radius: 50%;">
                    <i class="fas fa-shopping-cart fa-2x"></i>
                </div>
                <h4 class="fw-bold">Nouvelle Dépense</h4>
            </div>

            <form action="index.php?action=add_expense" method="POST">
                <div class="mb-3">
                    <label class="form-label small fw-bold text-secondary">TITRE</label>
                    <input type="text" name="title" class="form-control bg-light border-0 py-3" placeholder="Ex: Café, Transport..." required>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label small fw-bold text-secondary">MONTANT</label>
                        <input type="number" step="0.01" name="amount" class="form-control bg-light border-0 py-3" placeholder="0.00" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-bold text-secondary">DATE</label>
                        <input type="date" name="date" class="form-control bg-light border-0 py-3" value="<?= date('Y-m-d') ?>" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-bold text-secondary">CATÉGORIE</label>
                    <select name="category_id" class="form-select bg-light border-0 py-3" required>
                        <option value="" selected disabled>Choisir une catégorie...</option>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-danger btn-custom w-100 py-3">Enregistrer la dépense</button>
                <a href="index.php?action=dashboard" class="btn btn-link text-muted w-100 mt-2 text-decoration-none">Annuler</a>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>