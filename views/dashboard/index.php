<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        
        <div class="card card-custom gradient-card mb-4 text-center p-5 position-relative">
            <i class="fas fa-coins position-absolute" style="font-size: 150px; opacity: 0.05; top: -20px; right: -20px; color: white;"></i>
            
            <p class="text-white-50 text-uppercase fw-bold small ls-2">Solde Disponible</p>
            
            <h1 class="display-3 fw-bold mb-4"><?= $balance ?></h1>
            
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="index.php?action=add_budget" class="btn btn-light text-success btn-custom shadow-sm">
                    <i class="fas fa-arrow-up me-2"></i> Ajouter Solde
                </a>
                
                <a href="index.php?action=add_expense" class="btn btn-light text-danger btn-custom shadow-sm">
                    <i class="fas fa-arrow-down me-2"></i> Ajouter Dépense
                </a>
            </div>
        </div>

        <div class="card card-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold m-0 text-dark">
                    <i class="fas fa-history me-2 text-primary"></i> Dernières Opérations
                </h5>
                <span class="badge bg-primary rounded-pill px-3 opacity-75">
                    <?= isset($expenses) ? count($expenses) : 0 ?> Opérations
                </span>
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
                                <th class="text-center" style="width: 50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($expenses as $exp): ?>
                                <tr>
                                    <td>
                                        <span class="badge bg-light text-dark border p-2">
                                            <i class="fas fa-tag me-1 text-secondary"></i>
                                            <?= htmlspecialchars($exp['category_name'] ?? 'Autre') ?>
                                        </span>
                                    </td>
                                    
                                    <td class="fw-bold text-dark">
                                        <?= htmlspecialchars($exp['title']) ?>
                                    </td>
                                    
                                    <td class="text-muted small">
                                        <?= date('d M Y', strtotime($exp['date'])) ?>
                                    </td>
                                    
                                    <td class="text-end fw-bold text-danger">
                                        - <?= number_format($exp['amount'], 2) ?> DH
                                    </td>

                                    <td class="text-center">
                                        <a href="index.php?action=delete_expense&id=<?= $exp['id'] ?>" 
                                           class="btn btn-sm btn-outline-danger border-0 rounded-circle"
                                           title="Supprimer"
                                           onclick="return confirm('Voulez-vous vraiment supprimer cette dépense ? Le montant sera remboursé.');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
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