<?php

require_once 'Product.php';

class ProductElectronic extends Product
{
    function __construct($name, $price, $stock)
    {
        parent::__construct($name, $price, $stock);
    }
    
    function calculateDiscount() 
    {
        return $this->price = $this->price * 0.5;
    }
}