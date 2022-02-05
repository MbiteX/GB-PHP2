<?php
class Product
{
    public $id;
    public $title;
    public $description;
    public $size;
    public $price;
    public $count;

    public function __construct($title, $description, $size, $price, $count)
    {
        $this->title = $title;
        $this->description = $description;
        $this->size = $size;
        $this->price = $price;
        $this->count = $count;
    }

    public function view()
    {
        echo "<hr>
<h2>Карточка товара</h2>
<p>Название: $this->title</p>
<p>Описание: $this->description</p>
<p>Размер: $this->size</p>
<p>Цена: $this->price</p>
<p>Кол-во: $this->count</p>";
    }

    public function saleFromStock($number)
    {
        echo "<hr><h2>Продажа со склада</h2>";
        if (($this->count - $number) < 0) {
            echo "<p>Недостаточное количество товара на складе для продажи: $number шт.!</p><br>";
        } else {
            $this->count -= $number;
            echo "<p>Товар $this->title в количестве $number шт. успешно продан!</p><br>";
        }
        echo "<p>Остаток на складе: $this->count шт.</p><br>";
    }
}