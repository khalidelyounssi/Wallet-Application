<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="row justify-content-center mt-4">
    <div class="col-md-5">
        <div class="card card-custom p-4 border-warning"> <div class="text-center mb-4">
                <div class="icon-box bg-warning bg-opacity-10 text-warning mx-auto mb-3">
                    <i class="fas fa-edit fa-2x"></i>
                </div>
                <h4 class="fw-bold">Modifier la dépense</h4>
            </div>

            <form action="index.php?action=update_expense" method="POST">
                
                <input type="hidden" name="id" value="<?= $expense['id'] ?>">

                <div class="mb-3">
                    <label class="form-label small fw-bold text-secondary">TITRE</label>
                    <input type="text" name="title" class="form-control bg-light border-0 py-3" 
                           value="<?= htmlspecialchars($expense['title']) ?>" required>
                </div>

                <div class="row g-2 mb-3">
                    <div class="col-6">
                        <label class="form-label small fw-bold text-secondary">MONTANT</label>
                        <input type="number" step="0.01" name="amount" class="form-control bg-light border-0 py-3" 
                               value="<?= $expense['amount'] ?>" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-bold text-secondary">DATE</label>
                        <input type="date" name="date" class="form-control bg-light border-0 py-3" 
                               value="<?= $expense['date'] ?>" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-bold text-secondary">CATÉGORIE</label>
                    <select name="category_id" class="form-select bg-light border-0 py-3" required>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $expense['category_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning text-white btn-custom w-100 py-3">Mettre à jour</button>
                <a href="index.php?action=dashboard" class="btn btn-link text-muted w-100 mt-2 text-decoration-none">Annuler</a>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>