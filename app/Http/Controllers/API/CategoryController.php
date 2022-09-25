<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ApiBaseService;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryService $categoryService
     */
    private $categoryService;

    /**
     * @param ApiBaseService $apiBaseService;
     */
    private $apiBaseService;

    public function __construct(
        CategoryService $categoryService,
        ApiBaseService $apiBaseService
    ) {
        $this->categoryService = $categoryService;
        $this->apiBaseService = $apiBaseService;
    }

    /**
     * @return JsonResponse
     */

    public function getTrendingCategories(): JsonResponse
    {
        $categories = $this->categoryService->findTrendingCategories();

        return $this->apiBaseService->sendSuccessResponse($categories, 'Categories retrieved successfully.');
    }
}
