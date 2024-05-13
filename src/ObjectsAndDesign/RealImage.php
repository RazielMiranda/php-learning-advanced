<?php
namespace ObjectsAndDesign;
class RealImage
{
    public const DEFAULT_MIME = 'image/png';
    public function __construct(protected string $filename,
                                protected string $path,
                                protected string $mime_type = self::DEFAULT_MIME)
    {
        $this->image = base64_encode(file_get_contents($path . $filename));
    }
    public function display(string $mime_type = self::DEFAULT_MIME) : string
    {
        return '<img src="data:' . $mime_type . ';base64, ' . $this->image . '" />';
    }
}
