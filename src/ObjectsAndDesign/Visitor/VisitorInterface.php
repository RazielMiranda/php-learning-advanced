<?php
namespace ObjectsAndDesign\Visitor;
interface VisitorInterface
{
    public function visitDog(ComponentInterface $element);
    public function visitCat(ComponentInterface $element);
}
