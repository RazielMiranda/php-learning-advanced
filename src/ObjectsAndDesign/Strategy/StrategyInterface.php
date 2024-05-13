<?php
namespace ObjectsAndDesign\Strategy;

interface StrategyInterface
{
    public function __invoke(string $contents) : string;
}
