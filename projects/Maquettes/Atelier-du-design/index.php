<?php
include_once "./class/Database.php";
include_once './src/inc/functions.php';
$db = new Database();

// FORCE TO GET PAGE VALUE
$pages = [
   'accueil' => "index.php?page=accueil",
   'agence' => "index.php?page=agence",
   'equipe' => "index.php?page=equipe",
   'realisations' => "index.php?page=realisations",
   'contact' => "index.php?page=contact"
];

if (!isset($_GET['page'])) {
   $title = "accueil";
} else {
   if (!array_key_exists($_GET['page'], $pages)) {
      $title = "accueil";
   } else {
      $title = htmlspecialchars(trim($_GET['page']));
   }
}

// GENERAL QUERIES
$socials = $db->query('SELECT * FROM social_network', [])->fetchAll(PDO::FETCH_OBJ);
$siteInfo = $db->query('SELECT * FROM site_info', [])->fetch(PDO::FETCH_OBJ);
// QUERIES BY PAGES
if ($title == "accueil") {
   $valuePart = $db->getPartOfPage("valeurs", "home");
   $homeList = $db->selectPartList("home-list-1");
}
if ($title == "agence") {
   $agencyDescPart = $db->getPartOfPage("agency-description", "agency");
   $agencyList = $db->selectPartList("agency-list-1");
}
if ($title == "accueil" || $title == "equipe") {
   $teams = $db->query("SELECT teams.description, teams.name, categories.name AS role, teams.picture FROM teams, categories WHERE categories.id = teams.role ", []);
   $teams = $teams->fetchAll(PDO::FETCH_OBJ);
}
if ($title == "equipe") {
   $methods = $db->query('SELECT * FROM methods', []);
   $methods = $methods->fetchAll(PDO::FETCH_OBJ);
}
if ($title == "realisations") {
   $reels = $db->query('SELECT reels.title, reels.id, reels.picture, reels.description, teams.name AS author, reels.category FROM reels, teams WHERE reels.author = teams.id', []);
   $reels = $reels->fetchAll(PDO::FETCH_OBJ);
   $categories = $db->query('SELECT * FROM categories', []);
   $categories = $categories->fetchAll(PDO::FETCH_OBJ);
}


// INCLUDE HEAD AND DOCTYPE
include_once "./pages/layout/head.php";

// HEADER
include './pages/layout/header.php';

// ROUTING
switch ($title) {
   case "accueil":
      include './pages/home.php';
      break;
   case "agence":
      include './pages/agency.php';
      break;
   case "equipe":
      include './pages/team.php';
      break;
   case "realisations":
      include './pages/reels.php';
      break;
   case "contact":
      include './pages/contact.php';
      break;
   default:
      include './pages/404.php';
      break;
}

// INCLUDE FOOTER, JAVASCRIPT AND END OF DOCTYPE
include_once "./pages/layout/footer.php";
