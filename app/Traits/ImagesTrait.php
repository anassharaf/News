<?php

namespace App\Traits;

trait ImagesTrait
{
    private function uploadImage($image,$imageName,$path,$oldImage=null)
    {
        $image->move(public_path('Images/'.$path),$imageName);
        if (!is_null($oldImage)){
            unlink(public_path($oldImage));
        }
        return true;
    }
}
