<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\Wallet;

class AuthController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();
            $userId = $userModel->register($_POST['name'], $_POST['email'], $_POST['password']);
            if ($userId) {
                (new Wallet())->create($userId);
                header('Location: index.php?action=login'); exit;
            }
        }
        require __DIR__ . '/../../views/auth/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = (new User())->login($_POST['email'], $_POST['password']);
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header('Location: index.php?action=dashboard'); exit;
            }
        }
        require __DIR__ . '/../../views/auth/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?action=login');
    }
}