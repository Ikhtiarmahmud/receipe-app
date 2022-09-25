<?php


namespace App\Services;


use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use App\Facades\FileUpload;
use Illuminate\Support\Str;
use App\Repositories\CategoryRepository;

class CategoryService
{
    use CrudTrait;
    use FileTrait;

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->setActionRepository($this->categoryRepository);
    }

    public function saveCategoryInfo(array $data)
    {
        if(!empty($data['image'])) {
            $filename = FileUpload::saveImage($data);
            $data['image'] = $filename;
        }

        $this->save($data);
    }

    public function updateCategoryInfo(array $data, int $id)
    {
        $book = $this->findOne($id);

        if (!empty($data['image'])) {
            $this->deleteFile($book['image']);
            $data['image'] = FileUpload::saveImage($data);
        }

        $book->update($data);
    }

    public function findTrendingCategories()
    {
        return $this->categoryRepository->findTrendingCategories();
    }
}
