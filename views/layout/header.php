<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyWallet - Gestion Pro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f2f5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background: #fff;
            box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        }
        .card-custom {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            background: #fff;
            overflow: hidden;
        }
        .btn-custom {
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .gradient-card {
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            color: white;
        }
        .icon-box {
            width: 45px; height: 45px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 12px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light py-3 mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="index.php?action=dashboard">
        <i class="fas fa-wallet me-2"></i>MyWallet
    </a>
    <?php if(isset($_SESSION['user_id'])): ?>
        <div class="d-flex align-items-center">
            <span class="me-3 fw-bold text-dark d-none d-md-block"><?= htmlspecialchars($_SESSION['user_name']) ?></span>
            <a href="index.php?action=logout" class="btn btn-outline-danger btn-sm btn-custom rounded-pill px-3">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    <?php endif; ?>
  </div>
</nav>

<div class="container flex-grow-1">