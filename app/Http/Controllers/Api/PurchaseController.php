<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PurchaseListRequest;
use App\Services\PurchaseService;
use App\Models\Purchase;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;

class PurchaseController extends Controller
{
    /**
     * Get purchases list.
     *
     * @param  PurchaseListRequest $request
     * @return JsonResponse
     */
    public function getList(PurchaseListRequest $request): JsonResponse
    {
        $purchases = (new PurchaseService())->getList($request->validated());

        return response()->json([
            'purchases' => $purchases,
        ]);
    }

    /**
     * Get purchase.
     *
     * @param  Purchase $purchase
     * @return JsonResponse
     */
    public function get(Purchase $purchase): JsonResponse
    {
        $purchase = (new PurchaseService())->get($purchase);

        return response()->json([
            'purchase' => $purchase,
        ]);
    }
}
