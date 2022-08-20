<?php

namespace App\Helper;

class ImageHelper
{
    public static function getFullPath(string $folderName = 'img'): string
    {
        return config('app.url')."/storage/$folderName/";
    }
}
