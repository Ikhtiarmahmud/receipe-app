<?php
namespace App\Services;

use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use App\Facades\FileUpload;
use Illuminate\Support\Str;
use App\Repositories\ArticleRepository;

class ArticleService
{
    use CrudTrait;
    use FileTrait;

    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->setActionRepository($this->articleRepository);
    }

    public function saveArticleInfo(array $data)
    {
        if(!empty($data['image'])) {
            $filename = FileUpload::saveImage($data);
            $data['image'] = $filename;
        }

        $this->save($data);
    }

    public function updateArticleInfo(array $data, int $id)
    {
        $article = $this->findOne($id);

        if (!empty($data['image'])) {
            $this->deleteFile($article['image']);
            $data['image'] = FileUpload::saveImage($data);
        }

        $article->update($data);
    }
}