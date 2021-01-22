<?php

namespace App\Service;

class ImageService
{
    // Созраням картинку в storage
    public static function save($image, $folder)
    {
        $filenameWithExtension = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $filename = md5(pathinfo($filenameWithExtension, PATHINFO_FILENAME) . time());
        $filenameToStore = $filename.'.'.$extension;
        $foldername = substr($filename, 0, 2);

        $pathImage = $image->storeAs(
            $folder.'/'.$foldername, $filenameToStore, 'public'
        );
        return $pathImage;
    }
}