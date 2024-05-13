<?php
namespace ObjectsAndDesign\Visitor;
interface ComponentInterface
{
    public function accept(VisitorInterface $visitor) : void;
}
