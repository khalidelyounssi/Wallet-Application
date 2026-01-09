<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        
        <div class="row g-3 mb-4">
            <div class="col-md-6">
                <div class="card card-custom bg-success text-white p-4 h-100 position-relative overflow-hidden border-0 shadow-sm">
                    <i class="fas fa-wallet position-absolute" style="font-size: 100px; opacity: 0.1; top: -10px; right: -10px;"></i>
                    <p class="text-white-50 text-uppercase fw-bold small ls-2 mb-2">Solde Disponible</p>
                    <h2 class="display-6 fw-bold mb-0"><?= $balance ?></h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-custom bg-danger text-white p-4 h-100 position-relative overflow-hidden border-0 shadow-sm">
                    <i class="fas fa-chart-pie position-absolute" style="font-size: 100px; opacity: 0.1; top: -10px; right: -10px;"></i>
                    <p class="text-white-50 text-uppercase fw-bold small ls-2 mb-2">Total Dépenses</p>
                    <h2 class="display-6 fw-bold mb-0">
                        - <?= isset($totalExpenses) ? number_format($totalExpenses, 2) : '0.00' ?> DH
                    </h2>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center gap-3 mb-4">
            <a href="index.php?action=add_budget" class="btn btn-success shadow-sm px-4 py-2 rounded-pill">
                <i class="fas fa-arrow-up me-2"></i> Ajouter Solde
            </a>
            
            <a href="index.php?action=add_expense" class="btn btn-danger shadow-sm px-4 py-2 rounded-pill">
                <i class="fas fa-arrow-down me-2"></i> Ajouter Dépense
            </a>
        </div>

        <div class="card card-custom p-4 border-0 shadow-sm">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold m-0 text-dark">
                    <i class="fas fa-history me-2 text-primary"></i> Dernières Opérations
                </h5>
                <span class="badge bg-primary rounded-pill px-3 opacity-75">
                    <?= isset($expenses) ? count($expenses) : 0 ?> Opérations
                </span>
            </div>

            <div class="card card-custom bg-light p-3 mb-4 border-0">
                <form action="index.php" method="GET" class="d-flex gap-2 align-items-center flex-wrap">
                    <input type="hidden" name="action" value="dashboard">
                    
                    <label class="fw-bold text-secondary small text-uppercase">Filtrer par :</label>
                    
                    <select name="cat_id" class="form-select border-0 shadow-sm w-auto" onchange="this.form.submit()">
                        <option value="">Toutes les catégories</option>
                        <?php foreach($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= (isset($_GET['cat_id']) && $_GET['cat_id'] == $cat['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>

            <?php if (empty($expenses)): ?>
                <div class="text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-receipt fa-3x text-muted opacity-25"></i>
                    </div>
                    <h6 class="text-muted fw-bold">Aucune dépense pour le moment.</h6>
                    <p class="text-muted small">Commencez par ajouter votre première dépense.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="table-light text-secondary small text-uppercase">
                            <tr>
                                <th>Catégorie</th>
                                <th>Titre</th>
                                <th>Date</th>
                                <th class="text-end">Montant</th>
                                <th class="text-center" style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($expenses as $exp): ?>
                                <tr>
                                    <td>
                                        <span class="badge bg-white text-secondary border p-2">
                                            <i class="fas fa-tag me-1 text-muted"></i>
                                            <?= htmlspecialchars($exp['category_name'] ?? 'Autre') ?>
                                        </span>
                                    </td>
                                    
                                    <td class="fw-bold text-dark">
                                        <?= htmlspecialchars($exp['title']) ?>
                                    </td>
                                    
                                    <td class="text-muted small">
                                        <?= date('d M Y', strtotime($exp['date'])) ?>
                                    </td>

                                    <?php if ($exp['amount'] > 500): ?>
                                        <td class="text-end fw-bold text-danger">
                                            <i class="fas fa-exclamation-triangle me-1 small"></i>
                                            - <?= number_format($exp['amount'], 2) ?> DH
                                        </td>
                                    <?php else: ?>
                                        <td class="text-end fw-bold text-dark">
                                            - <?= number_format($exp['amount'], 2) ?> DH
                                        </td>
                                    <?php endif; ?>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="index.php?action=edit_expense&id=<?= $exp['id'] ?>" 
                                               class="btn btn-sm btn-light text-warning" title="Modifier">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="index.php?action=delete_expense&id=<?= $exp['id'] ?>" 
                                               class="btn btn-sm btn-light text-danger"
                                               title="Supprimer"
                                               onclick="return confirm('Voulez-vous vraiment supprimer ?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>