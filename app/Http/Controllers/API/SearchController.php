<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ApiBaseService;
use App\Services\SearchService;

class SearchController extends Controller
{
    private $searchService;
    private $apiBaseService;
    public function __construct(SearchService $searchService, ApiBaseService $apiBaseService)
    {
        $this->searchService = $searchService;
        $this->apiBaseService = $apiBaseService;
    }

    public function search($query): \Illuminate\Http\JsonResponse
    {
        try {
            $results = $this->searchService->search($query);

            return $this->apiBaseService->sendSuccessResponse($results, 'Search results retrieved successfully.');
        } catch (\Exception $e) {
            return $this->apiBaseService->sendErrorResponse($e->getMessage(), [], 400);
        }
    }

    public function searchByCategory($categoryID, $query = ''): \Illuminate\Http\JsonResponse
    {
       try {
           $results = $this->searchService->searchByCategory($categoryID, $query);

           return $this->apiBaseService->sendSuccessResponse($results, 'Search results retrieved successfully.');
         } catch (\Exception $e) {
           return $this->apiBaseService->sendErrorResponse($e->getMessage(), [], 400);
         }
    }
}
