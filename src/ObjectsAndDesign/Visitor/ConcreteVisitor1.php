<?php
namespace ObjectsAndDesign\Visitor;
class ConcreteVisitor1 implements VisitorInterface
{
    public function visitDog(ComponentInterface $element)
    {
        echo get_class($element) . ':' . $element->methodDog() . "\n";
    }
    public function visitCat(ComponentInterface $element)
    {
        echo get_class($element) . ':' . $element->methodCat() . "\n";
    }
}
