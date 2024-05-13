<?php
namespace ObjectsAndDesign\Flyweight;
// Flyweight factory class
class FontCssFactory
{
    private $styles = [];
    public function getFormat(string $f = FontCSS::FONT_FAMILY,
                              string $z = FontCSS::FONT_SIZE,
                              string $y = FontCSS::FONT_STYLE,
                              string $v = FontCSS::FONT_VARIANT,
                              string $w = FontCSS::FONT_WEIGHT,
                              string $h = FontCSS::LINE_HEIGHT,
                              string $s = FontCSS::FONT_STRETCH)
    {
        $key = $this->getKey($f, $z, $y, $v, $w, $h, $s);
        // store font if it doesn't exist
        if (!isset($this->styles[$key])) {
            $this->styles[$key] = new FontCSS($f, $z, $y, $v, $w, $h, $s);
        }
        return $this->styles[$key];
    }
    private function getKey(...$args)
    {
        return implode('_', $args);
    }
}
