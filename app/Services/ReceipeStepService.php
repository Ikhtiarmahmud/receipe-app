<?php
namespace App\Services;

use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use App\Facades\FileUpload;
use Illuminate\Support\Str;
use App\Repositories\ReceipeStepRepository;

class ReceipeStepService
{
    use CrudTrait;
    use FileTrait;

    /**
     * @var ReceipeStepRepository
     */

    private $receipeStepRepository;

    public function __construct(ReceipeStepRepository $receipeStepRepository)
    {
        $this->receipeStepRepository = $receipeStepRepository;
        $this->setActionRepository($this->receipeStepRepository);
    }

    public function saveReceipeStep(array $data, int $receipeId)
    {
        foreach ($data as $step) {

            if(!empty($step['image'])) {
                $filename = FileUpload::saveImage($step);
                $step['image'] = $filename;
            }

            $step['receipe_id'] = $receipeId;
            $this->receipeStepRepository->save($step);
        }

        return true;
    }

    public function updateReceipeStep(array $data, int $receipeId)
    {
        $ids = collect($data)->pluck('id')->toArray();
        $this->receipeStepRepository->deleteNonExistsSteps($ids, $receipeId);

        foreach ($data as $step) {
            if(!empty($step['image'])) {
                $this->deleteFile($step['image']);
                $step['image'] = FileUpload::saveImage($data);
            }

            $step['receipe_id'] = $receipeId;
            $this->receipeStepRepository->updateStep($step);
        }

        return true;
    }
}
