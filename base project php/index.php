<?php
require_once './src/utils/functions.php';

$title = "Home";

if (isset($_GET['page'])) {
   $title = htmlspecialchars(trim($_GET['page']));
}

$singleLink = "index.php?page=Article";

$pages = [
   'Home' => "index.php?page=Home",
];

include 'layout/head.php';

switch ($title) {
   case 'Home':
      include 'home.php';
      break;
   default:
      include 'home.php';
      break;
}

include 'layout/foot.php';
