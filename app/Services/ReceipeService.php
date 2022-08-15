<?php
namespace App\Services;

use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Services\ReceipeStepService;
use App\Repositories\ReceipeRepository;
use App\Services\ReceipeIngridientService;

class ReceipeService
{
    use CrudTrait;
    use FileTrait;

    /**
     * @var ReceipeRepository
     */
    private $receipeRepository;

     /**
     * @var ReceipeIngridientService
     */
    private $receipeIngridientService;

    /**
     * @var ReceipeStepService
     */
    private $receipeStepService;

    public function __construct(
        ReceipeRepository $receipeRepository,
        ReceipeIngridientService $receipeIngridientService,
        ReceipeStepService $receipeStepService
    ){
        $this->receipeRepository = $receipeRepository;
        $this->receipeIngridientService = $receipeIngridientService;
        $this->receipeStepService = $receipeStepService;
        $this->setActionRepository($receipeRepository);
    }

    public function saveReceipeInfo(array $data)
    {
        DB::transaction(function () use ($data) {

            if (!empty($data['image'])) {
                $filename = $this->saveImage($data);
                $data['image'] = $filename;
            }

        $receipe = $this->save($data);

        $this->receipeIngridientService->saveReceipeIngridients($data['group-a'], $receipe->id);
        $this->receipeStepService->saveReceipeStep($data['group-b'], $receipe->id);

        });
    }

    public function updateReceipeInfo(array $data, int $id)
    {
        DB::transaction(function () use ($data, $id) {
            $book = $this->findOne($id);

            if (!empty($data['image'])) {
                $filename = $this->saveImage($data);
                $data['image'] = $filename;
            }

            $book->update($data);

            $this->receipeIngridientService->updateReceipeIngridients($data['group-a'], $id);
            $this->receipeStepService->updateReceipeStep($data['group-b'], $id);
        });
    }

    private function saveImage($data): string
    {
        $extension       = $data['image']->getClientOriginalExtension();
        $file_name       = 'images'.'-'.Str::random(30).'.'.$extension;
        $this->upload($data['image'], 'images', $file_name);

        return $file_name;
    }
}