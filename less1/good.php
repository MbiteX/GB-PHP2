<?php
require_once "Product.class.php";
require_once "Discount.class.php";

// $title, $description, $size, $price, $count
$good1 = new Product("Ботинок", "Описания нет", 43, rand(800, 2000), rand(8, 12));
$good1->view();
$good1->saleFromStock(10);
$good1->saleFromStock(3);

// $title, $description, $size, $price, $count, $percent
$good2 = new Discount("Носок", "Какое-то описание", 43, rand(800, 2000), rand(1, 4), 30);
$good2->view();
$good2->saleFromStock(2);
$good2->saleFromStock(1);
