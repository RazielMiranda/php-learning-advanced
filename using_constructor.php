<?php
include __DIR__ . '/vendor/autoload.php';
use ObjectsAndDesign\Product;
$prod[] = new Product('Foo','F2039',1.11, 9.99);
$prod[] = new Product('Bar','B9922',2.22, 9.99);
$prod[] = new Product('Baz','Z0134',3.33, 9.99);
print_r($prod);

// output:
/*
array(3) {
  [0]=>
  object(Product)#1 (5) {
    ["date"]=>
    object(DateTime)#2 (3) {
      ["date"]=>
      string(26) "2023-08-08 03:31:47.038365"
      ["timezone_type"]=>
      int(3)
      ["timezone"]=>
      string(3) "UTC"
    }
    ["name"]=>
    string(3) "Foo"
    ["sku"]=>
    string(5) "F2039"
    ["cost"]=>
    float(1.11)
    ["price"]=>
    float(9.99)
  }
  [1]=>
  object(Product)#3 (5) {
    ["date"]=>
    object(DateTime)#4 (3) {
      ["date"]=>
      string(26) "2023-08-08 03:31:47.038369"
      ["timezone_type"]=>
      int(3)
      ["timezone"]=>
      string(3) "UTC"
    }
    ["name"]=>
    string(3) "Bar"
    ["sku"]=>
    string(5) "B9922"
    ["cost"]=>
    float(2.22)
    ["price"]=>
    float(9.99)
  }
  [2]=>
  object(Product)#5 (5) {
    ["date"]=>
    object(DateTime)#6 (3) {
      ["date"]=>
      string(26) "2023-08-08 03:31:47.038369"
      ["timezone_type"]=>
      int(3)
      ["timezone"]=>
      string(3) "UTC"
    }
    ["name"]=>
    string(3) "Baz"
    ["sku"]=>
    string(5) "Z0134"
    ["cost"]=>
    float(3.33)
    ["price"]=>
    float(9.99)
  }
}
*/
