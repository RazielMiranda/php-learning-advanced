<?php
include __DIR__ . '/vendor/autoload.php';
use ObjectsAndDesign\Visitor\ComponentDog;
use ObjectsAndDesign\Visitor\ComponentCat;
use ObjectsAndDesign\Visitor\ConcreteVisitor1;

$components = [
    new ComponentDog(),
    new ComponentCat(),
];

$visitor = new ConcreteVisitor1();
foreach ($components as $component) {
    $component->accept($visitor);
}

// actual output:
/*
ObjectsAndDesign\Visitor\ComponentDog:Bow wow
ObjectsAndDesign\Visitor\ComponentCat:Meow
*/
