<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\WeekInterface;
use Illuminate\Http\JsonResponse;

class WeeksController extends Controller
{
    private WeekInterface $week;

    public function __construct(WeekInterface $week)
    {
        $this->week = $week;
    }

    public function current(): JsonResponse
    {
        return response()->json([
            'week' => $this->week->getCurrentWeek(),
        ]);
    }
}
