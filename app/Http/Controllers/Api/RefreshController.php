<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\JsonResponse;

class RefreshController extends Controller
{
    public function refresh(Request $request): JsonResponse
    {
        Artisan::call('data:refresh');
        return response()->json([
            'message' => 'Data refreshed!'
        ]);
    }

    public function setValues(Request $request): JsonResponse
    {
        if ($request->has('teams')) {

        }
        return response()->json([
            'message' => 'Data updated!'
        ]);
    }
}
