<?php

require_once "Products.class.php";
require_once "DigitalProduct.class.php";
require_once "PieceProduct.class.php";
require_once "WeightProduct.class.php";

$piecePrice = rand(450, 550);

$products = [
    new PieceProduct('Ботинок левый', $piecePrice, 8),
    new PieceProduct('Ботинок правый', $piecePrice, 8),
    new DigitalProduct('Инструкция', 300),
    new WeightProduct('Шнурок', $piecePrice, 1.44),
];

$summ = 0;
foreach ($products as $product) {
    $summ = $summ + $product->getFinalPrice();
    echo "<br><b>" . $product->getName() . '</b> стоит ' . $product->getFinalPrice();
}
echo "<hr><b> ИТОГО: </b>" . $summ;