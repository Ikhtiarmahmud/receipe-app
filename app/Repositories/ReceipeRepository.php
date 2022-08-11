<?php
namespace App\Repositories;

use App\Models\Receipe;
use App\Repositories\AbstractBaseRepository;

class ReceipeRepository extends AbstractBaseRepository
{
   protected $modelName = Receipe::class;
}