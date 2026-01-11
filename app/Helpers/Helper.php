<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Nette\Utils\Image;

if (! function_exists('upload')) {
    function upload($folder, $id, $file, $name = false, $size = false) {
        if($file){
            $nameReq = $name ? $name : pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = Str::slug($nameReq)."-".date('ymdhis').".".$file->getClientOriginalExtension();
            if(!$size && !is_array($size)){
                $file->move("./storage/uploads/".$folder."/".$id, $filename);
            }else{
                $path = public_path()."/storage/uploads/".$folder."/".$id;
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $image = Image::fromFile($file->getRealPath());
                $image->save($path . '/' .$filename, $size);
            }

            return $filename;
        }else{
            return false;
        }
    }
}

if (! function_exists('destroy')) {
    function destroy($folder, $id, $file) {
        $fileDir = "storage/uploads/".$folder."/".$id."/".$file['name'];
        File::delete(public_path($fileDir));
    }
}
