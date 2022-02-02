<?php


function translit($string)
{
  $translit = array(
    'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
    'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
    'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu', 'я' => 'ya'
  );

  return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $translit));
}

function changeImage($h, $w, $src, $newsrc, $type)
{
  $newimg = imagecreatetruecolor($h, $w);
  switch ($type) {
    case 'jpeg':
      $img = imagecreatefromjpeg($src);
      imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
      imagejpeg($newimg, $newsrc);
      break;
    case 'png':
      $img = imagecreatefrompng($src);
      imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
      imagepng($newimg, $newsrc);
      break;
    case 'gif':
      $img = imagecreatefromgif($src);
      imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
      imagegif($newimg, $newsrc);
      break;
  }
}

$width = 150;
$height = 150;


if (isset($_POST['send'])) {
  if ($_FILES['userfile']['error']) {
    $message = 'Ошибка загрузки файла!';
    echo "<div>$message <A href='../'>Назад в альбом</A></div>";
  } elseif ($_FILES['userfile']['size'] > 1000000) {
    $message = 'Файл слишком большой';
    echo "<div>$message <A href='../'>Назад в альбом</A></div>";
  } elseif (
    $_FILES['userfile']['type'] == 'image/jpeg' ||
    $_FILES['userfile']['type'] == 'image/png' ||
    $_FILES['userfile']['type'] == 'image/gif'
  ) {
    if (copy($_FILES['userfile']['tmp_name'], "../img/photo/" . translit($_FILES['userfile']['name']))) {
      $path = "../img/photo_small/" . translit($_FILES['userfile']['name']);
      $type = explode('/', $_FILES['userfile']['type'])[1];

      $files = "../img/photo/" . translit($_FILES['userfile']['name']);
      list($width_orig, $height_orig) = getimagesize($files);

      $ratio_orig = $width_orig / $height_orig;

      if ($width / $height > $ratio_orig) {
        $width = $height * $ratio_orig;
      } else {
        $height = $width / $ratio_orig;
      }

      changeImage($width, $height, $_FILES['userfile']['tmp_name'], $path, $type);

      $message = 'Файл загружен!';
      echo "<div>$message ($width_orig, $height_orig в $height, $width) <A href='../'>Назад в альбом</A></div>";
    } else {
      $message = 'Ошибка загрузки файла!';
      echo "<div>$message <A href='../'>Назад в альбом</A></div>";
    }
  } else {
    $message = 'Не правильный тип файла!';
    echo "<div>$message <A href='../'>Назад в альбом</A></div>";
  }
}
// $images = array_slice(scandir(PHOTO_SMALL), 2);