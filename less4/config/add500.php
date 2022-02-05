<?php
include_once '../config/config.php';

$description = "Разнообразный и богатый опыт дальнейшее развитие различных форм деятельности играет важную роль в формировании прогресса профессионального общества. Разнообразный и богатый опыт сложившаяся структура организации играет важную роль в формировании прогресса профессионального общества.";




for ($i = 1; $i < 500; $i++) {
    $price = rand(100, 1000);
    $files = "card" . rand(1, 6) . ".png";
    $sql = "INSERT INTO `goods` (`name`, `description`, `price`, `img`)
            VALUES ('Товар {$i}','{$description}','{$price}','{$files}');";
    $res = mysqli_query($connect, $sql);
    if ($res) {
        print_r("$files ");
    };
}