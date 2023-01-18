<?php
namespace App\Services;

use App\Traits\CrudTrait;
use Edujugon\PushNotification\PushNotification;

class PushNotificationService
{
    use CrudTrait;

    public function sendPushNotification($send_to_topic, $data)
    {
        $push = new PushNotification('fcm');

        if ($send_to_topic == "recipe") {
            $push->setMessage([
                'notification' => [
                    'title' => $data['title'],
                    'body' =>  $data['description'],
                    'sound' => 'default'
                ],
                'data' => [
                    'id' => $data["id"] ?? "",
                    'image_url' => $data["image"] ?? "",
                    "type" => "recipe",
                ]
            ])
                ->setApiKey(env('FIREBASE_SERVER_KEY'));

            $push->sendByTopic('recipe');

        } else if ($send_to_topic == "article") {
            $push->setMessage([
                'notification' => [
                    'title' => $data['title'],
                    'body' =>  $data['description'],
                    'sound' => 'default'
                ],
                'data' => [
                    'id' => $data["id"] ?? "",
                    'image_url' => $data["image"] ?? "",
                    "type" => "article"
                ]
            ])
                ->setApiKey(env('FIREBASE_SERVER_KEY'));

            $push->sendByTopic('article');
        } else {
            $push->setMessage([
                'notification' => [
                    'title' => $data['title'],
                    'body' =>  $data['sub_title'],
                    'sound' => 'default'
                ],
                "data" => [
                    "type" => $data["type"] ?? "",
                    "image" => $data["image"] ?? "",
                    "column_id" => $data["column_id"] ?? "",
                ]
            ])
                ->setApiKey(env('FIREBASE_SERVER_KEY'));

            $push->sendByTopic('all');
        }
    }
}
