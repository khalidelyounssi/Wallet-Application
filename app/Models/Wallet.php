<?php
namespace App\Models;
use App\Config\Database;
use PDO;

class Wallet {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create($userId) {
        $query = "INSERT INTO wallets (user_id, budget) VALUES (:uid, 0.00)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':uid' => $userId]);
    }

    public function getWallet($userId) {
        $query = "SELECT * FROM wallets WHERE user_id = :uid LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':uid' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deposit($userId, $amount) {
        $query = "UPDATE wallets SET budget = budget + :amount WHERE user_id = :uid";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([':amount' => $amount, ':uid' => $userId]);
    }
}