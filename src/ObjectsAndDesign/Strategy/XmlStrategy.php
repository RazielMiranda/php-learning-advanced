<?php
namespace ObjectsAndDesign\Strategy;

use XmlWriter;
class XmlStrategy implements StrategyInterface
{
    public function __invoke(string $contents) : string
    {
        $list = explode("\n", $contents);
        $xw = new XMLWriter();
        $xw->openMemory();
        $xw->startDocument("1.0");
        $xw->startElement('root');
        foreach ($list as $line) {
            $xw->startElement('text');
            $xw->text($line);
            $xw->endElement();
        }
        $xw->endElement();
        $xw->endDocument();
        return $xw->outputMemory();
    }
}
