<?php


class PieceProduct extends Products
{
    private $count;

    public function __construct($name, $price, $count)
    {
        parent::__construct($name, $price);
        $this->count = $count;
    }

    public function getFinalPrice(): float
    {
        return $this->price * $this->count;
    }
}
