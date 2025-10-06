<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexDashboardRequest;
use App\Http\Requests\StoreDashboardRequest;
use App\Services\IndexDashboardService;
use App\Services\StoreDashboardService;

class DashboardController extends Controller
{
    protected $indexDashboardService;
    protected $storeDashboardService;

    public function __construct(IndexDashboardService $indexDashboardService, StoreDashboardService $storeDashboardService)
    {
        $this->indexDashboardService = $indexDashboardService;
        $this->storeDashboardService = $storeDashboardService;
    }

public function index(IndexDashboardRequest $request)
    {
        $validated = $request->validated();
        $data = $this->indexDashboardService->getDashboardData(
            $validated['user_id']
        );

        return response()->json([
            'success' => true,
            'data' => array_merge($data, ['user_id' => $validated['user_id']]),
        ], 200);
    }

       public function store(StoreDashboardRequest $request)
    {
        $validated = $request->validated();
        $response = $this->storeDashboardService->storeTransaction($validated);

        return response()->json([
            'success' => $response['success'],
            'message' => $response['message'],
            'data' => $response['data'],
        ], 201);
    }
}