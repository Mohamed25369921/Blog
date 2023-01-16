<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait UploadImage
{

    public function upload($file)
    {

        $file_name = Str::uuid() . $file->getClientOriginalName();
        $file->move(public_path('images'), $file_name);
        $path = 'images/' . $file_name;

        return $path;
    }
}
