<?php
namespace App\Models;

use App\Config\Database;
use App\Abstracts\Transaction; 
use App\Interfaces\Calculable; 
use PDO;

class Expense extends Transaction implements Calculable {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getType() {
        return "Dépense";
    }

        public function add($walletId, $categoryId, $title, $amount, $date) {
        try {
            $this->conn->beginTransaction();

            $query = "INSERT INTO expenses (wallet_id, category_id, title, amount, date) 
                      VALUES (:wid, :cid, :title, :amount, :date)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([
                ':wid' => $walletId, 
                ':cid' => $categoryId, 
                ':title' => $title, 
                ':amount' => $amount, 
                ':date' => $date
            ]);
            
            $update = "UPDATE wallets SET budget = budget - :amount WHERE id = :wid";
            $stmtUp = $this->conn->prepare($update);
            $stmtUp->execute([':amount' => $amount, ':wid' => $walletId]);

            $this->conn->commit();
            return true;
        } catch (\Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    public function delete($id) {
        try {
            $this->conn->beginTransaction();

            $queryGet = "SELECT amount, wallet_id FROM expenses WHERE id = :id";
            $stmtGet = $this->conn->prepare($queryGet);
            $stmtGet->execute([':id' => $id]);
            $expense = $stmtGet->fetch(PDO::FETCH_ASSOC);

            if ($expense) {
                $queryWallet = "UPDATE wallets SET budget = budget + :amount WHERE id = :wid";
                $stmtWallet = $this->conn->prepare($queryWallet);
                $stmtWallet->execute([
                    ':amount' => $expense['amount'],
                    ':wid' => $expense['wallet_id']
                ]);

                $queryDel = "DELETE FROM expenses WHERE id = :id";
                $stmtDel = $this->conn->prepare($queryDel);
                $stmtDel->execute([':id' => $id]);

                $this->conn->commit();
                return true;
            }
            return false;
        } catch (\Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    public function getHistory($walletId) {
        $query = "SELECT e.*, c.name as category_name 
                  FROM expenses e
                  JOIN categories c ON e.category_id = c.id
                  WHERE e.wallet_id = :wid
                  ORDER BY e.date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':wid' => $walletId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}