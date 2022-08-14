<?php
namespace App\Repositories;

use App\Models\ReceipeStep;
use App\Repositories\AbstractBaseRepository;

class ReceipeStepRepository extends AbstractBaseRepository
{
   protected $modelName = ReceipeStep::class;   
}