<?php
namespace App\Services;

use App\Traits\CrudTrait;
use Illuminate\Support\Str;
use App\Repositories\ArticleRepository;
use App\Traits\FileTrait;

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
            $filename = $this->saveImage($data);
            $data['image'] = $filename;
        }

        $this->save($data);
    }

    public function updateArticleInfo(array $data, int $id)
    {
        $article = $this->findOne($id);

        if (!empty($data['image'])) {
            $this->deleteFile($article['image']);
            $data['image'] = $this->saveImage($data);
        }

        $article->update($data);
    }

    private function saveImage($data): string
    {
        $extension       = $data['image']->getClientOriginalExtension();
        $file_name       = 'images'.'-'.Str::random(30).'.'.$extension;
        $this->upload($data['image'], 'images', $file_name);

        return $file_name;
    }
}