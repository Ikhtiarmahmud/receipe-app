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

    public function saveReceipeIngridients(array $data, int $receipeId)
    {
        foreach ($data as $ingridient) {
            $ingridient['receipe_id'] = $receipeId;
            $this->receipeIngridientRepository->save($ingridient);
        }

        return true;
    }

    public function updateReceipeIngridients(array $data, int $receipeId)
    {
        $ids = collect($data)->pluck('id')->toArray();
        $this->receipeIngridientRepository->deleteNonExistsIngridients($ids, $receipeId);
        
        foreach ($data as $ingridient) {
            $ingridient['receipe_id'] = $receipeId;
            $this->receipeIngridientRepository->updateIngredient($ingridient);
        }

        return true;
    }
}