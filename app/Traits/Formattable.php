<?php
namespace App\Traits;

trait Formattable {
    public function formatCurrency($amount) {
        return number_format((float)$amount, 2, '.', ' ') . ' DH';
    }
}