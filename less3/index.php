<?php

const PHOTO_PATH = 'img/photo';
const PHOTO_SMALL_PATH = 'img/photo_small';

// подгружаем и активируем авто-загрузчик Twig-а
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указывае где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('templates');

  // инициализируем Twig
  $twig = new Twig_Environment($loader);

  // подгружаем шаблон
  $template = $twig->loadTemplate('v_index.html');

  // Получаем список фотографий 
  $photos_in_dir = array_slice(scandir(PHOTO_PATH), 2);

  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  //echo print_r($photos_in_dir);
  echo $template->render(array(
    'title' => 'Список фото',
    'path_to_photo_small' => PHOTO_SMALL_PATH,
    'photos' => $photos_in_dir
  ));
} catch (Exception $e) {
  die('ERROR: ' . $e->getMessage());
}