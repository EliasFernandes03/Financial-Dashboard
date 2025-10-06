<?php

namespace App\Repositories\Contracts;

use App\Models\Transaction;

interface IStoreTransactionRepository
{

    public function getDashboardData($userId): array;

    public function createTransaction(array $data): Transaction;
}