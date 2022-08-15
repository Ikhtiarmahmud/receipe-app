<?php
namespace App\Repositories;

use App\Models\ReceipeIngredient;
use App\Repositories\AbstractBaseRepository;

class ReceipeIngridientRepository extends AbstractBaseRepository
{
   protected $modelName = ReceipeIngredient::class;

   public function updateIngredient(array $data)
   {
      return $this->model->updateOrCreate(['id' => $data['id']], $data);
   }

   public function deleteNonExistsIngridients($ids, $receipeId)
   {
      return $this->model->whereNotIn('id', $ids)
           ->where('receipe_id', $receipeId)
           ->delete();
   }
}