<?php
namespace ObjectsAndDesign\Strategy;

class JsonStrategy implements StrategyInterface
{
    public function __invoke(string $contents) : string
    {
        return json_encode(['text' => explode("\n", $contents)], JSON_PRETTY_PRINT);
    }
}
