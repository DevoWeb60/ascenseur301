<?php
require_once './src/class/Database.php';
require_once './src/utils/functions.php';
$db = new Database();

$pages = [
   'Home' => "index.php?page=Home",
   'departement' => "index.php?page=departement",
   'villes' => "index.php?page=villes",
   'entreprise' => "index.php?page=entreprise&amp;code_postal="
];

if (!isset($_GET['page'])) {
   $title = "Home";
} else {
   if (!array_key_exists($_GET['page'], $pages)) {
      $title = "Home";
   } else {
      $title = htmlspecialchars(trim($_GET['page']));
   }
}


if ($title == "Home") {
   $regions = $db->query('SELECT id, code, name FROM regions', []);
   $regions = $regions->fetchAll(PDO::FETCH_OBJ);
}
if ($title == "departement") {
   if (isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) && $_GET['id'] >= 0) {
      $id = strSecur($_GET['id']);
      $currentRegion = $db->query('SELECT regions.id, regions.name FROM regions WHERE regions.id = ?', [$id]);
      $currentRegion = $currentRegion->fetch(PDO::FETCH_OBJ);
      $departements = $db->query('SELECT departments.id, departments.code, departments.name, departments.code FROM departments, regions WHERE regions.code = departments.region_code AND regions.id = ?', [$id]);
      $departements = $departements->fetchAll(PDO::FETCH_OBJ);
   } else {
      redirectTo($pages['Home']);
   }
}
if ($title == "villes") {
   if (isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT) && $_GET['id'] >= 0) {
      $id = strSecur($_GET['id']);
      $currentRegion = $db->query('SELECT regions.id, regions.name FROM departments, regions WHERE departments.id = ? AND departments.region_code = regions.code', [$id]);
      $currentRegion = $currentRegion->fetch(PDO::FETCH_OBJ);
      $departmentName = $db->query('SELECT departments.name FROM villes, departments WHERE departments.id = ? AND departments.code = villes.departement', [$id]);
      $departmentName = $departmentName->fetch(PDO::FETCH_OBJ);
      $villes = $db->query('SELECT villes.id, villes.code_postal, villes.nom_reel FROM villes, departments WHERE departments.id = ? AND villes.departement = departments.code ORDER BY villes.code_postal', [$id]);
      $villes = $villes->fetchAll(PDO::FETCH_OBJ);
   } else {
      redirectTo($pages['Home']);
   }
}

if ($title == "entreprise") {
   if (isset($_GET['code_postal']) && !empty($_GET['code_postal']) && filter_var($_GET['code_postal'], FILTER_VALIDATE_INT) && $_GET['code_postal'] >= 0) {
      $codePostal = strSecur($_GET['code_postal']);
      $codeDepartement = substr($codePostal, 0, 2);
      $department = $db->query('SELECT departments.name, departments.id FROM departments WHERE departments.code = ?', [$codeDepartement]);
      $department = $department->fetch(PDO::FETCH_OBJ);
      $entreprises = $db->query('SELECT commune, denomination, libelleape FROM entreprises WHERE entreprises.codepostal = ?', [$codePostal]);
      $entreprises = $entreprises->fetchAll(PDO::FETCH_OBJ);
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
