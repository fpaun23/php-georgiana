<?php

class Products implements ProductsInterface {
    private $productPrice; 
     
    public function setPrice(int $price)
    { 
      $this->productPrice = $price; 
    }
    
    public function getPrice()
    {
      return $this->productPrice; 
    }
}