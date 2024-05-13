<?php
namespace ObjectsAndDesign;
use DateTime;
class Product
{
    public DateTime $date;
    public function __construct(
        public string $name,
        public string $sku,
        public float  $cost,
        public float  $price)
    {
        $this->date = new DateTime('now');
    }
}
