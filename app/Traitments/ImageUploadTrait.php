<?php 

namespace App\Traitments;
use Intervention\Image\ImageManagerStatic as Image;

trait ImageUploadTrait {
    protected $imgPath = "app/public/images/covers";
    protected $imgWidth =  600;
    protected $imgHeight =  600;

    public function uploadImg($img) {
        $imgName = $this->imgName($img);

        return Image::make($img)->resize($this->imgWidth, $this->imgHeight)->save(storage_path($this->imgPath. '/'. $imgName));
    }

    public function imgName($img) {
        return time() . '-' . $img->getClientOriginalName();
    }
}