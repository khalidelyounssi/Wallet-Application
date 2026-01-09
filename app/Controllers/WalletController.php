<?php
namespace App\Controllers;
use App\Models\Wallet;
use App\Models\Expense;
use App\Traits\Formattable;

class WalletController {
    use Formattable;

    public function index() {
        if (!isset($_SESSION['user_id'])) { header('Location: index.php?action=login'); exit; }
        
        
        $walletModel = new Wallet();
        $wallet = $walletModel->getWallet($_SESSION['user_id']);
        $walletId = $wallet ? $wallet['id'] : null;

        $balance = $wallet ? $this->formatCurrency($wallet['budget']) : '0.00 DH';
        $expenses = $wallet ? (new Expense())->getHistory($wallet['id']) : [];

        $categoryModel = new \App\Models\Category();
    $categories = $categoryModel->getAll();


        if ($walletId) {
            if (isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
                $expenses = (new Expense())->getByCategory($walletId, $_GET['cat_id']);
            } else {
                $expenses = (new Expense())->getHistory($walletId);
            }
        } else {
            $expenses = [];
        }

        require __DIR__ . '/../../views/dashboard/index.php';
    }

    public function addBudget() {
        if (!isset($_SESSION['user_id'])) { header('Location: index.php?action=login'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new Wallet())->deposit($_SESSION['user_id'], $_POST['amount']);
            header('Location: index.php?action=dashboard'); exit;
        }
        require __DIR__ . '/../../views/wallet/add.php';
    }
}