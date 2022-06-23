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

include './src/layout/head.php';

switch ($title) {
   case 'Home':
      include './src/pages/home.php';
      break;
   default:
      include './src/pages/home.php';
      break;
}

include './src/layout/foot.php';
