<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait UploadFileTrait {

    public function upload($file, $path = 'public')
    {
        $name = str_replace(" ", "_", $file->getClientOriginalName());
        $fileName = time()."_".$name;
        $file->storeAs($path, $fileName);
        return $fileName;
    }

    public function remove($fileName, $path = 'public')
    {
        Storage::delete($path.'/'.$fileName);
    }
}

?>
