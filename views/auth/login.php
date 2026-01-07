<?php include __DIR__ . '/../layout/header.php'; ?>
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-4">
        <div class="card card-custom p-5">
            <h2 class="fw-bold text-center text-primary mb-4">Bienvenue</h2>
            <form action="index.php?action=login" method="POST">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control bg-light border-0 py-3" placeholder="Adresse Email" required>
                </div>
                <div class="mb-4">
                    <input type="password" name="password" class="form-control bg-light border-0 py-3" placeholder="Mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary btn-custom w-100 py-3 mb-3">Se connecter</button>
                <div class="text-center">
                    <a href="index.php?action=register" class="small text-decoration-none">Créer un nouveau compte</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>