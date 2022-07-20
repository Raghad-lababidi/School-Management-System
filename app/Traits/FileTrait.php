<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

Trait FileTrait
{
    public function saveFile($file , $folder)
    {
        $file_extension = $file  -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $file  -> move($path, $file_name);
        return $file_name;
    }

    public function deleteFile($file , $folder)
    {
        $file_name = $folder.$file;
        if (File::exists($file_name))
        File::delete($file_name);

    }
}
