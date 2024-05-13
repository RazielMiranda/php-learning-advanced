<?php
namespace ObjectsAndDesign\Visitor;
class ComponentCat implements ComponentInterface
{
    public function accept(VisitorInterface $visitor) : void
    {
        $visitor->visitCat($this);
    }
    public function methodCat() : string { return 'Meow'; }
}
