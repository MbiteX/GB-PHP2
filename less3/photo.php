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
  $template = $twig->loadTemplate('v_photo.html');

  $photo = stripcslashes($_GET['photo']);
  if (!file_exists(PHOTO_PATH . '/' . $photo)) throw new Exception('Фото отсутсвует');

  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $template->render(array(
    'title' => "Фото $photo",
    'path_to_photo' => PHOTO_PATH,
    'photo' => $photo
  ));
} catch (Exception $e) {
  die('ERROR: ' . $e->getMessage());
}
