<?php
require_once 'Product.class.php';

class Discount extends Product
{
    public $percent;

    public function __construct($title, $description, $size, $price, $count, $percent)
    {
        parent::__construct($title, $description, $size, $price, $count);
        $this->percent = $percent;
    }

    public function view()
    {
        parent::view();
        echo "
            <p>Скидка: $this->percent</p><br>
        ";
    }
}