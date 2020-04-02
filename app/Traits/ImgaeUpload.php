<?php
namespace App\Traits;



trait ImgaeUpload{
    public function UserImageUpload($query,$dir="image") // Taking input image as parameter
    {
        $image_name = str_random(20);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name.'.'.$ext;
        $upload_path = 'image/'.$dir.'/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path.$image_full_name;
        $success = $query->move($upload_path,$image_full_name);
        return $image_url; // Just return image

    }
}