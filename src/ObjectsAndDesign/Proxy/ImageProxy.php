<?php
namespace ObjectsAndDesign\Proxy;
use ObjectsAndDesign\RealImage;
class ImageProxy
{
    const AUTH_CODE = 123456;
    const DEFAULT_IMAGE = 'default.png';
    public static function display(string $authCode,
                                   string $filename,
                                   string $path,
                                   string $mimeType = RealImage::DEFAULT_MIME) : string
    {
        if($authCode == self::AUTH_CODE) {
            $img = (new RealImage($filename, $path, $mimeType))->display();
        } else {
            $img = (new RealImage(self::DEFAULT_IMAGE, $path))->display();
        }
        return $img;
    }
}
