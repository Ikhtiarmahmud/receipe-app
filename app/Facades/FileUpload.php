<?php

namespace App\Facades;

use App\Traits\FileTrait;
use Illuminate\Support\Str;

class FileUpload
{
    use FileTrait;
    
    public static function saveImage($data): string
    {
        $extension       = $data['image']->getClientOriginalExtension();
        $file_name       = 'images'.'-'.Str::random(30).'.'.$extension;
        (new FileUpload)->upload($data['image'], 'images', $file_name);

        return $file_name;
    }
}