<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PaymentCreateRequest;
use App\Http\Requests\PaymentProlongRequest;
use App\Services\PaymentService;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;

class PaymentController extends Controller
{
    /**
     * Pay product.
     *
     * @param  PaymentCreateRequest $request
     * @return JsonResponse
     */
    public function pay(PaymentCreateRequest $request): JsonResponse
    {
        $purchase = (new PaymentService())->pay($request->validated());

        return response()->json([
            'purchase' => $purchase,
        ]);
    }

    /**
     * Prolong rent product.
     *
     * @param  PaymentProlongRequest $request
     * @return JsonResponse
     */
    public function prolong(PaymentProlongRequest $request): JsonResponse
    {
        $purchase = (new PaymentService())->prolong($request->validated());

        return response()->json([
            'purchase' => $purchase,
        ]);
    }
}
