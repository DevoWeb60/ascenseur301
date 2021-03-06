<?php
require_once './src/utils/functions.php';
require_once './src/utils/database.php';

$title = "Home";

if (isset($_GET['page'])) {
   $title = htmlspecialchars(trim($_GET['page']));
}


$carSelect = getGetParams('car');
$carModelSelect = getGetParams('model');
$carColorSelect = getGetParams('color');

$pages = [
   'Home' => "index.php?page=Home",
   'Modèle' => "index.php?page=Modèle&amp;car=",
   'Couleur' => 'index.php?page=Couleur&amp;car=' . $carSelect . '&amp;model=',
   'Récapitulatif' => 'index.php?page=Récapitulatif&amp;car=' . $carSelect . '&amp;model=' . $carModelSelect . '&amp;color=',
];

getSecure($carSelect, array_key_exists($carSelect, $cars), function () use ($pages) {
   redirectTo($pages['Home']);
});

if (isset($carSelect)) {
   getSecure($carModelSelect, in_array($carModelSelect, $cars[$carSelect]['models']), function () use ($pages) {
      redirectTo($pages['Home']);
   });
}

if (isset($carColorSelect)) {
   getSecure($carColorSelect, array_key_exists($carColorSelect, $randomHexaColors), function () use ($pages) {
      redirectTo($pages['Home']);
   });
}

include './src/layout/head.php';

switch ($title) {
   case 'Home':
      include './src/pages/home.php';
      break;
   case 'Modèle':
      include './src/pages/models.php';
      break;
   case 'Couleur':
      include './src/pages/colors.php';
      break;
   case 'Récapitulatif':
      include './src/pages/recap.php';
      break;
   default:
      include './src/pages/home.php';
      break;
}

include './src/layout/foot.php';
