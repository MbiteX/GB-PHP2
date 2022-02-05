<?php
require_once '../config/config.php';


$id = $_POST["GOODS"];


$sql = "SELECT * FROM goods WHERE id>$id LIMIT 9";

$result = $connectPDO->query($sql)->fetchAll(PDO::FETCH_ASSOC);

unset($connectPDO);

$res = [];
foreach ($result as $ac) {
    $html .= "<div class='catalog-item' data-id='{$ac['id']}'
    style='margin: 10px; border: 1px solid black; width: min-content;'>
    <img src='img/{$ac['img']}' width='320px' alt='{$ac['id']}'>
    <h2>{$ac['name']}</h2>
    <p>{$ac['description']}</p>
    <h3>$ {$ac['price']}</h3>
</div>";
}

$res['html'] = $html;
echo json_encode($res);