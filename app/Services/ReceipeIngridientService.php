<?php
namespace App\Services;

use App\Repositories\ReceipeIngridientRepository;
use App\Traits\CrudTrait;

class ReceipeIngridientService
{
    use CrudTrait;

    /**
     * @var ReceipeIngridientRepository
     */
    private $receipeIngridientRepository;

    public function __construct(ReceipeIngridientRepository $receipeIngridientRepository)
    {
        $this->receipeIngridientRepository = $receipeIngridientRepository;
        $this->setActionRepository($this->receipeIngridientRepository);
    }

    
}