<?php

require_once('ProductsClass.php');

class ProductsController
{
    protected string $name;
    protected int $price;

    public function __construct(int $newPrice, string $newName)
    {
        $this->name = $newPrice;
        $this->price = $newName;
    }

    public function manageProduct(): void
    {
        $productsObj = new ProductsClass($this->price, $this->name);      
        $productsObj->printPriceAndName();
    }
}
