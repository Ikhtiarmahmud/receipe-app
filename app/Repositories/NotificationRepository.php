<?php
namespace App\Repositories;

use App\Models\Notification;
use App\Repositories\AbstractBaseRepository;

class NotificationRepository extends AbstractBaseRepository
{
   protected $modelName = Notification::class;
}