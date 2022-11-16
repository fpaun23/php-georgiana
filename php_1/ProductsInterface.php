<?php

interface ProductsInterface
{
    public function setPrice(int $price): void;
    public function getPrice(): int;
}
