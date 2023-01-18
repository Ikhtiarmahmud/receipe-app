<?php

namespace App\Http\Controllers;

use App\Services\PushNotificationService;
use Illuminate\Http\Request;

class PushNotificationController extends Controller
{
    private $pushNotificationService;
    public function __construct(PushNotificationService $pushNotificationService)
    {
        $this->pushNotificationService = $pushNotificationService;
    }

    public function sendPushNotification(Request $request)
    {
       return $this->pushNotificationService->sendPushNotification($request);
    }
}
