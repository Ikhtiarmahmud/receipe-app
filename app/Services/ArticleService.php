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

    private $pushNotificationService;

    public function __construct(
        ArticleRepository $articleRepository,
        PushNotificationService $pushNotificationService
    ) {
        $this->articleRepository = $articleRepository;
        $this->pushNotificationService = $pushNotificationService;
        $this->setActionRepository($this->articleRepository);
    }

    public function saveArticleInfo(array $data): void
    {
        if(!empty($data['image'])) {
            $filename = FileUpload::saveImage($data);
            $data['image'] = $filename;
        }

        $result = $this->save($data);

        $this->pushNotificationService->sendPushNotification("article", $result);
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
