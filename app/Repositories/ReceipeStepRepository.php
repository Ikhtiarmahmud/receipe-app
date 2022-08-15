<?php
namespace App\Repositories;

use App\Models\ReceipeStep;
use App\Repositories\AbstractBaseRepository;

class ReceipeStepRepository extends AbstractBaseRepository
{
   protected $modelName = ReceipeStep::class;

   public function updateStep(array $data)
   {
      return $this->model->updateOrCreate(['id' => $data['id']], $data);
   }

   public function deleteNonExistsSteps($ids, $receipeId)
   {
       $this->model->whereNotIn('id', $ids)
           ->where('receipe_id', $receipeId)
           ->delete();
   }
}