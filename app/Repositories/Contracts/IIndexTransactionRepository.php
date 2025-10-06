<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface IIndexTransactionRepository
{
    public function getTotalBalance(int $userId): float;
    public function getTotalIncome(int $userId): float;
    public function getTotalExpenses(int $userId): float;
    public function getExpensesByCategory(int $userId): Collection;
    public function getRecentTransactions(int $userId, int $limit = 5): Collection;
}