<?php
namespace App\Repositories;

use App\Models\Article;
use App\Repositories\AbstractBaseRepository;

class ArticleRepository extends AbstractBaseRepository
{
   protected $modelName = Article::class;

    public function search($query)
    {
         return $this->model->where('title', 'like', "%$query%")
              ->orWhere('description', 'like', "%$query%")
              ->get();
    }
}
