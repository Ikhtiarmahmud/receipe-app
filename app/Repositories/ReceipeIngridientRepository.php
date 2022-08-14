<?php
namespace App\Repositories;

use App\Models\ReceipeIngredient;
use App\Repositories\AbstractBaseRepository;

class ReceipeIngridientRepository extends AbstractBaseRepository
{
   protected $modelName = ReceipeIngredient::class;
}