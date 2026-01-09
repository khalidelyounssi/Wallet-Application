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

    public function edit() {
        if (!isset($_SESSION['user_id'])) { header('Location: index.php?action=login'); exit; }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $expenseModel = new Expense();
            $expense = $expenseModel->getById($id);

            $categories = (new \App\Models\Category())->getAll();

            require __DIR__ . '/../../views/expenses/edit.php';
        } else {
            header('Location: index.php?action=dashboard');
        }
    }

    public function update() {
        if (!isset($_SESSION['user_id'])) { header('Location: index.php?action=login'); exit; }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $amount = $_POST['amount'];
            $categoryId = $_POST['category_id'];
            $date = $_POST['date'];

            $wallet = (new \App\Models\Wallet())->getWallet($_SESSION['user_id']);
            
            if ($wallet) {
                (new Expense())->update($id, $wallet['id'], $categoryId, $title, $amount, $date);

            }
        }
        header('Location: index.php?action=dashboard');
        exit;
    }

}