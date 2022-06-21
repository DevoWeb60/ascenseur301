<?php
$title = "Home";

if (isset($_GET['page'])) {
    $title = htmlspecialchars(trim($_GET['page']));
}

$singleLink = "index.php?page=Article";

$pages = [
    'Home' => "index.php?page=Home",
    'About Us' => "index.php?page=About Us",
    'Contact' => "index.php?page=Contact",
    'Blog' => "index.php?page=Blog",
];

include 'layout/head.php';

switch ($title) {
    case 'Home':
        include 'home.php';
        break;
    case 'About Us':
        include 'about.php';
        break;
    case 'Contact':
        include 'contact.php';
        break;
    case 'Blog':
        include 'blog.php';
        break;
    case 'Article':
        include 'single.php';
        break;
    default:
        include 'home.php';
        break;
}

include 'layout/foot.php';
