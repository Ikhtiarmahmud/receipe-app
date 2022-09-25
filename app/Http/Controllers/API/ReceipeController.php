<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ApiBaseService;
use App\Services\ReceipeService;
use Illuminate\Http\JsonResponse;

class ReceipeController extends Controller
{
    /**
     * @param ApiBaseService $apiBaseService;
     */
    private ApiBaseService $apiBaseService;

    /**
     * @param ReceipeService $receipeService;
     */
    private ReceipeService $receipeService;

    public function __construct(
        ApiBaseService $apiBaseService,
        ReceipeService $receipeService
    ) {
        $this->apiBaseService = $apiBaseService;
        $this->receipeService = $receipeService;
    }

    /**
     * @param $categoryId
     * @return JsonResponse
     */
    public function getRecipesByCategory($categoryId): JsonResponse
    {
        $recipes = $this->receipeService->findBy(['category_id' => $categoryId], ['ingredients', 'steps'], ['column' => 'id', 'direction' => 'desc']);

        return $this->apiBaseService->sendSuccessResponse($recipes, 'Recipes retrieved successfully.');
    }
}
