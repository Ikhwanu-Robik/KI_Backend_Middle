<?php

class Product
{
    var $name;

    var $price;

    var $stock;

    function __construct($name, $price, $stock)
    {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    function showInformation()
    {
        echo "Nama : " . $this->name . ", Harga : " . $this->price . ", Stock : " . $this->stock . "<br>";
        echo "Harga setelah diskon: " . $this->calculateDiscount() . "<br>";
    }
}