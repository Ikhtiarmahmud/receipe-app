<?php
namespace App\Repositories;

use App\Models\Receipe;
use App\Repositories\AbstractBaseRepository;

class ReceipeRepository extends AbstractBaseRepository
{
   protected $modelName = Receipe::class;

   public function search($query)
   {
       return $this->model->where('title', 'like', "%$query%")
           ->orWhere('description', 'like', "%$query%")
           ->get();
   }

   public function searchByCategory($categoryID, $query)
   {
       return $this->model->where('category_id', $categoryID)
           ->where(function ($queryBuilder) use ($query) {
               $queryBuilder->where('title', 'like', "%$query%")
                   ->orWhere('description', 'like', "%$query%");
           })
           ->get();
   }
}
