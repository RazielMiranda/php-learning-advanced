<?php
namespace ObjectsAndDesign\Visitor;
class ComponentDog implements ComponentInterface
{
    public function accept(VisitorInterface $visitor) : void
    {
        $visitor->visitDog($this);
    }
    public function methodDog() : string { return 'Bow wow'; }
}
