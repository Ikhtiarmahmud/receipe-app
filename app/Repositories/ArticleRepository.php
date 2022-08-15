<?php
namespace App\Repositories;

use App\Models\Article;
use App\Repositories\AbstractBaseRepository;

class ArticleRepository extends AbstractBaseRepository
{
   protected $modelName = Article::class;
}