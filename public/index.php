<?php
require_once __DIR__ . '/../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) { session_start(); }

use App\Controllers\AuthController;
use App\Controllers\WalletController;
use App\Controllers\ExpenseController;

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'register': (new AuthController())->register(); break;
    case 'login':    (new AuthController())->login(); break;
    case 'logout':   (new AuthController())->logout(); break;
    
    
    
    default: header('Location: index.php?action=login'); break;
}