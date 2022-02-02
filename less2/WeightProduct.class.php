<?php

class WeightProduct extends Products
{
    private $weight;

    public function __construct($name, $price, $weight)
    {
        $this->weight = $weight;

        parent::__construct($name, $price);
    }

    public function getFinalPrice(): float
    {
        return $this->price * $this->weight;
    }
}