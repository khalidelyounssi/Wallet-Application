<?php
namespace App\Controllers;
use App\Models\Expense;
use App\Models\Wallet;
use App\Models\Category;

class ExpenseController {
    public function add() {
        if (!isset($_SESSION['user_id'])) { header('Location: index.php?action=login'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $wallet = (new Wallet())->getWallet($_SESSION['user_id']);
            if ($wallet) {
                (new Expense())->add($wallet['id'], $_POST['category_id'], $_POST['title'], $_POST['amount'], $_POST['date']);
                header('Location: index.php?action=dashboard'); exit;
            }
        }
        $categories = (new Category())->getAll();
        require __DIR__ . '/../../views/expenses/add.php';
    }



    public function delete() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $expenseModel = new Expense();
            $expenseModel->delete($id);
        }

        header('Location: index.php?action=dashboard');
        exit;
    }

}