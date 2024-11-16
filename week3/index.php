<?php

require_once 'ProductElectronic.php';
require_once 'ProductFashion.php';

$product1 = new ProductElectronic("Laptop", 10000, 23);
$product1->showInformation();

$product2 = new ProductFashion("Kaos", 7000, 3);
$product2->showInformation();
