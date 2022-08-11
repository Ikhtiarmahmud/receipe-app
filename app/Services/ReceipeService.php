<?php
namespace App\Services;

use App\Traits\CrudTrait;
use Illuminate\Support\Str;
use App\Repositories\ReceipeRepository;
use App\Traits\FileTrait;

class ReceipeService
{
    use CrudTrait;
    use FileTrait;

    /**
     * @var ReceipeRepository
     */
    private $receipeRepository;

    public function __construct(ReceipeRepository $receipeRepository)
    {
        $this->receipeRepository = $receipeRepository;
        $this->setActionRepository($receipeRepository);
    }

    public function saveReceipeInfo(array $data)
    {
        if(!empty($data['image'])) {
            $filename = $this->saveImage($data);
            $data['image'] = $filename;
        }

        $this->save($data);
    }

    public function updateReceipeInfo(array $data, int $id)
    {
        $book = $this->findOne($id);

        if (!empty($data['image'])) {
            $this->deleteFile($book['image']);
            $data['image'] = $this->saveImage($data);
        }

        $book->update($data);
    }

    private function saveImage($data): string
    {
        $extension       = $data['image']->getClientOriginalExtension();
        $file_name       = 'images'.'-'.Str::random(30).'.'.$extension;
        $this->upload($data['image'], 'images', $file_name);

        return $file_name;
    }
}