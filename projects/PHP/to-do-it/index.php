<?php
session_start();
require_once './src/utils/functions.php';
require_once './src/utils/database.php';

$title = "Accueil";


if (isset($_GET['page'])) {
   $title = htmlspecialchars(trim($_GET['page']));
}
if (!isset($_SESSION['connected']) && $title == "Accueil") {
   $title = "Connexion";
}

$pages = [
   'Accueil' => "index.php?page=Accueil",
   'Connexion' => 'index.php?page=Connexion',
   'Inscription' => 'index.php?page=Inscription',
   'logout' => 'index.php?page=logout',
];
require_once './src/utils/login.php';
require_once './src/utils/register.php';
require_once './src/utils/todo.php';

include './src/layout/head.php';

switch ($title) {
   case 'Accueil':
      include './src/pages/home.php';
      break;
   case 'Connexion':
      include './src/pages/login.php';
      break;
   case 'Inscription':
      include './src/pages/register.php';
      break;
   case 'logout':
      session_destroy();
      redirectTo('index.php?page=Connexion');
      break;
   default:
      include './src/pages/home.php';
      break;
}

include './src/layout/foot.php';
