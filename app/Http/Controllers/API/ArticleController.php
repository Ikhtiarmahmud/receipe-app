<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ApiBaseService;
use App\Services\ArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @var $articleService
     */
    private ArticleService $articleService;

    /**
     * @var $apiBaseService;
     */
    private ApiBaseService $apiBaseService;

    public function __construct(
        ArticleService $articleService,
        ApiBaseService $apiBaseService
    ) {
        $this->articleService = $articleService;
        $this->apiBaseService = $apiBaseService;
    }

    /**
     * @return JsonResponse
     */
    public function getArticles(): JsonResponse
    {
        $articles = $this->articleService->findAll(15, [], ['column' => 'id', 'direction' => 'desc']);

        return $this->apiBaseService->sendSuccessResponse($articles, 'Articles retrieved successfully.');
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getSingleArticle($id): JsonResponse
    {
        $article = $this->articleService->findOne($id);

        return $this->apiBaseService->sendSuccessResponse($article, 'Article retrieved successfully.');
    }
}
