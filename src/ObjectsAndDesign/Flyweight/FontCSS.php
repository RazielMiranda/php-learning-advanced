<?php
namespace ObjectsAndDesign\Flyweight;
// ref: https://developer.mozilla.org/en-US/docs/Web/CSS/font
class FontCSS
{
    // NOTE: uses PHP 8 constructor argument promotion
    public const FONT_FAMILY = 'sans_serif';
    public const FONT_SIZE    = '100%';
    public const FONT_STYLE   = 'normal';
    public const FONT_VARIANT = 'normal';
    public const FONT_WEIGHT  = 'normal';
    public const LINE_HEIGHT  = 'normal';
    public const FONT_STRETCH = 'normal';
    public function __construct(
        private string $font_family  = 'sans_serif',
        private string $font_size    = '100%',
        private string $font_style   = 'normal',
        private string $font_weight  = 'normal',
        private string $line_height  = 'normal',
        private string $font_variant = 'normal',
        private string $font_stretch = 'normal')
    {}
    public function __invoke()
    {
        $style = get_object_vars($this);
        $html = '';
        foreach ($style as $key => $value) {
            $html .= str_replace('_', '-', $key) . ':' . $value . ';';
        }
        return substr($html, 0, -1);    // -1 removes trailing ';'
    }
}
