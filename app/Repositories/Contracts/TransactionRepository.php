<?php

namespace App\Repositories\Contracts;

use App\Models\Transaction;
use App\Repositories\Contracts\ITransactionRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TransactionRepository implements ITransactionRepository
{
    protected $model;

    public function __construct(Transaction $model)
    {
        $this->model = $model;
    }

    public function getTotalBalance(int $userId): float
    {
        return $this->model->forUser($userId)
            ->selectRaw('SUM(CASE WHEN type = "income" THEN amount ELSE -amount END) as balance')
            ->value('balance') ?? 0.0;
    }

    public function getTotalIncome(int $userId): float
    {
        return $this->model->forUser($userId)
            ->income()
            ->sum('amount') ?? 0.0;
    }

    public function getTotalExpenses(int $userId): float
    {
        return $this->model->forUser($userId)
            ->expense()
            ->sum('amount') ?? 0.0;
    }

    public function getExpensesByCategory(int $userId): Collection
    {
        return $this->model->forUser($userId)
            ->expense()
            ->select('categories.name as category', DB::raw('SUM(transactions.amount) as total'))
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->groupBy('categories.id', 'categories.name')
            ->get();
    }

    public function getRecentTransactions(int $userId, int $limit = 5): Collection
    {
        return $this->model->forUser($userId)
            ->with('category') 
            ->orderBy('date', 'desc')
            ->limit($limit)
            ->get();
    }
}