<?php


namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends AbstractBaseRepository
{
    protected $modelName = Category::class;

    public function findTrendingCategories()
    {
        return $this->model->select('id', 'title', 'image')
            ->withCount('receipes')
            ->orderBy('receipes_count', 'desc')
            ->limit(5)
            ->get();
    }
}
