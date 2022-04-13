<?php

namespace Core\Orders;

class Product
{
    public function __construct(
        protected string $name,
        protected float $price,
        protected int $total, 
    ) {}

    public function total(): float
    {
        return $this->price * $this->total;
    }

    public function totalWithTax10(): float
    {
        $total = $this->price * $this->total;
        return ($total * 0.1) + $total;
    }
}
