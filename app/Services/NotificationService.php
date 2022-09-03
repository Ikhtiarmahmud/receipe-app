<?php
namespace App\Services;

use App\Facades\FileUpload;
use App\Traits\CrudTrait;
use App\Traits\FileTrait;
use Illuminate\Support\Str;
use App\Repositories\NotificationRepository;

class NotificationService
{
    use CrudTrait;
    use FileTrait;

    /**
     * @var NotificationRepository
     */
    private $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
        $this->setActionRepository($this->notificationRepository);
    }

    public function saveNotificationInfo(array $data)
    {
        if(!empty($data['image'])) {
            $filename = FileUpload::saveImage($data);
            $data['image'] = $filename;
        }

        $this->save($data);
    }

    public function updateArticleInfo(array $data, int $id)
    {
        $notification = $this->findOne($id);

        if (!empty($data['image'])) {
            $this->deleteFile($notification['image']);
            $data['image'] = FileUpload::saveImage($data);
        }

        $notification->update($data);
    }
}