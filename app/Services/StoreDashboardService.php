<?php

namespace App\Services;

use App\Repositories\Contracts\StoreTransactionRepository;
use Exception;

class StoreDashboardService
{
    protected $dashboardRepository;

    public function __construct(StoreTransactionRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function getDashboardData($userId)
    {
        return $this->dashboardRepository->getDashboardData($userId);
    }

    public function storeTransaction(array $data)
    {
        try {
            $transaction = $this->dashboardRepository->createTransaction($data);
            return [
                'success' => true,
                'message' => 'Transação criada com sucesso.',
                'data' => $transaction
            ];
        } catch (Exception $e) {
            throw new Exception('Erro ao criar transação: ' . $e->getMessage());
        }
    }
}