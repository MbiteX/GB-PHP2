<?php
require_once '../config/config.php';

// подгружаем и активируем авто-загрузчик Twig-а
require_once '../Twig/Autoloader.php';
Twig_Autoloader::register();



try {
    // указывае где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem('templates');

    // инициализируем Twig
    $twig = new Twig_Environment($loader);

    // подгружаем шаблон
    $template = $twig->loadTemplate('v_index.tmpl');

    // Получаем список фотографий 
    $sql = 'SELECT * FROM goods WHERE id>0 LIMIT 9';

    $result = $connectPDO->query($sql)->fetchAll(PDO::FETCH_ASSOC);

    unset($connectPDO);
    // передаём в шаблон переменные и значения
    // выводим сформированное содержание
    // echo print_r($lastId);
    echo $template->render(array(
        'title' => "Список фото",
        'photos' => $result
    ));
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}
