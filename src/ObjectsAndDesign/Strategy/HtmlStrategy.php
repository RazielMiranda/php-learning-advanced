<?php
namespace ObjectsAndDesign\Strategy;

class HtmlStrategy implements StrategyInterface
{
    public function __invoke(string $contents) : string
    {
        $html = '<ul>' . PHP_EOL;
        $list = explode("\n", $contents);
        foreach ($list as $line)
            $html .= '<li>' . $line . '</li>' . PHP_EOL;
        $html .= '</ul>' . PHP_EOL;
        return $html;
    }
}
