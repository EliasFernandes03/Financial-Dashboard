<?php

namespace App\Services;

use App\Repositories\Contracts\IIndexTransactionRepository;

class IndexDashboardService
{
    protected $transactionRepository;

    public function __construct(IIndexTransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function getDashboardData(int $userId): array
    {
        return [
            'balance' => $this->transactionRepository->getTotalBalance($userId),
            'income' => $this->transactionRepository->getTotalIncome($userId),
            'expenses' => $this->transactionRepository->getTotalExpenses($userId),
            'expensesByCategory' => $this->transactionRepository->getExpensesByCategory($userId),
            'recentTransactions' => $this->transactionRepository->getRecentTransactions($userId),
        ];
    }
}