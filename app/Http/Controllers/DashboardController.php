<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexDashboardRequest;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

public function index(IndexDashboardRequest $request)
    {
        $validated = $request->validated();
        $data = $this->dashboardService->getDashboardData(
            $validated['user_id']
        );

        return response()->json([
            'success' => true,
            'data' => array_merge($data, ['user_id' => $validated['user_id']]),
        ], 200);
    }
}