<?php
require_once './src/class/Database.php';
require_once './src/utils/functions.php';
$db = new Database();

$title = "Home";

if (isset($_GET['page'])) {
   $title = htmlspecialchars(trim($_GET['page']));
}

$pages = [
   'Home' => "index.php?page=Home",
   'departement' => "index.php?page=departement",
   'villes' => "index.php?page=villes"
];

if ($title == "Home") {
   $villes = $db->query('SELECT id, nom FROM villes LIMIT 0, 100', []);
   $villes = $villes->fetchAll(PDO::FETCH_OBJ);
   $regions = $db->query('SELECT id, name FROM regions', []);
   $regions = $regions->fetchAll(PDO::FETCH_OBJ);
}
if ($title == "departement") {
   if (isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) && $_GET['id'] >= 0) {
      $id = strSecur($_GET['id']);
      $currentRegion = $db->query('SELECT regions.name FROM regions WHERE regions.id = ?', [$id]);
      $currentRegion = $currentRegion->fetch(PDO::FETCH_OBJ);
      $departements = $db->query('SELECT departments.id, departments.name, departments.code FROM departments, regions WHERE regions.code = departments.region_code AND regions.id = ?', [$id]);
      $departements = $departements->fetchAll(PDO::FETCH_OBJ);
   } else {
      redirectTo($pages['Home']);
   }
}
if ($title == "villes") {
   if (isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) && $_GET['id'] >= 0) {
      $id = strSecur($_GET['id']);
      $villes = $db->query('SELECT villes.id, villes.nom_reel FROM villes, departments, regions WHERE villes.departement = ? AND departments.region_code = regions.code', [$id]);
      $villes = $villes->fetchAll(PDO::FETCH_OBJ);
   } else {
      redirectTo($pages['Home']);
   }
}

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
