<?php
namespace App\Services;

use App\Repositories\ArticleRepository;
use App\Repositories\ReceipeRepository;

class SearchService
{
    private $articleRepository;
    private $receipeRepository;

    public function __construct(ReceipeRepository $receipeRepository, ArticleRepository $articleRepository)
    {
        $this->receipeRepository = $receipeRepository;
        $this->articleRepository = $articleRepository;
    }

    public function search($query): array
    {
        $receipes = $this->receipeRepository->search($query);

        $articles = $this->articleRepository->search($query);

        return [
            'receipes' => $receipes,
            'articles' => $articles
        ];
    }

    public function searchByCategory($categoryID, $query)
    {
        $receipes = $this->receipeRepository->searchByCategory($categoryID, $query);

        return $receipes;
    }
}
