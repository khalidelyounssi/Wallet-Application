<?php
namespace App\Abstracts;

abstract class Transaction {
    protected $id;
    protected $title;
    protected $amount;
    protected $date;

    public function getDate() {
        return $this->date;
    }

    abstract public function getType();
}