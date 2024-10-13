<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProductListRequest;
use App\Services\ProductService;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    /**
     * Get products list.
     *
     * @param  ProductListRequest $request
     * @return JsonResponse
     */
    public function getList(ProductListRequest $request): JsonResponse
    {
        $products = (new ProductService())->getList($request->validated());

        return response()->json([
            'products' => $products,
        ]);
    }
}
