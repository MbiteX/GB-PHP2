<?php


class DigitalProduct extends Products
{
    public function getFinalPrice(): float
    {
        return $this->price;
    }
}
