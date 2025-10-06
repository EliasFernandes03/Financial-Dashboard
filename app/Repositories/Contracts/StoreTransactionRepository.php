<?php

namespace App\Repositories\Contracts;

use App\Models\Category;
use App\Models\Transaction;
use App\Repositories\Contracts\IStoreTransactionRepository;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StoreTransactionRepository implements IStoreTransactionRepository
{

    public function getDashboardData($userId): array
    {
        return [
            'balance' => Transaction::forUser($userId)->sum(DB::raw('CASE WHEN type = "income" THEN amount ELSE -amount END')),
            'income' => Transaction::forUser($userId)->income()->sum('amount'),
            'expenses' => Transaction::forUser($userId)->expense()->sum('amount'),
            'expensesByCategory' => Transaction::forUser($userId)
                ->expense()
                ->join('categories', 'transactions.category_id', '=', 'categories.id')
                ->groupBy('categories.name')
                ->select('categories.name as category', DB::raw('SUM(transactions.amount) as total'))
                ->get()
                ->toArray(),
            'recentTransactions' => Transaction::forUser($userId)
                ->with('category')
                ->orderBy('date', 'desc')
                ->take(5)
                ->get()
                ->map(function ($transaction) {
                    return [
                        'description' => $transaction->description,
                        'amount' => $transaction->amount,
                        'type' => $transaction->type,
                        'category' => $transaction->category->name,
                        'date' => $transaction->date,
                    ];
                })
                ->toArray()
        ];
    }

    public function createTransaction(array $data): Transaction
    {
        $category = Category::firstOrCreate(
            ['name' => $data['category']],
            ['name' => $data['category']]
        );

        return Transaction::create([
            'user_id' => $data['user_id'],
            'description' => $data['description'],
            'amount' => $data['amount'],
            'type' => $data['type'],
            'category_id' => $category->id,
            'date' => Carbon::now(),
        ]);
    }
}