<?php 
    if($_GET['page'] !== "404"){
        header('location: index.php?page=404'); 
        exit();
    }
    
?>

<div class="container p-404">
    <h2>404 | Page non trouvé</h2>
    <a href="./index.php" class="btn-red">Revenir à l'accueil</a>
</div>