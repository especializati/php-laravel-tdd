<?php

namespace App\Repository\Contracts;

interface PaginationInterface
{
    public function items(): array;
    public function total(): int;
    public function currentPage(): int;
    public function perPage(): int;
    public function firstPage(): int;
    public function lastPage(): int;
}

