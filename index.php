<?php 
    require_once 'php/functions.php';
    require_once 'php/Category.php';
    require_once 'php/Project.php';
    require_once 'php/Tool.php';
    require_once 'php/Browser.php';

    $Category = new Category();
    $Browser = new Browser();

    if(isset($_GET['categorie'])){
        $getCategorie = htmlspecialchars(trim($_GET['categorie']));
        $bodyClass = strtolower($getCategorie);
    }else if(isset($_GET['page'])){
        $bodyClass = strtolower(htmlspecialchars(trim($_GET['page'])));
    }else{
        $bodyClass = "";
    }

    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="views/assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="views/style/css/style.min.css">
    <script src="//cdn.jsdelivr.net/npm/phaser@3.11.0/dist/phaser.js"></script>
    <title>Thibault Berthelin</title>
</head>
<body class="<?= $bodyClass ?>">
    <?php require_once 'views/templates/sidebar.php'; ?>
    <div class="container">
        <?php if(empty($_GET)){
            require_once 'views/templates/home.php'; 
        }else if(isset($_GET['categorie'])){ 
            require_once 'views/templates/categorie.php'; 
         }else if(isset($_GET['search'])){ 
            require_once 'views/templates/search.php';
         }else if(isset($_GET['page'])){ 
            if($_GET['page'] === "favoris"){
                require_once 'views/templates/favories.php';
            }else if($_GET['page'] === "extensions"){
                require_once 'views/templates/extensions.php';
            }else{
                require_once 'views/templates/404.php';
            }
         }else{
             require_once 'views/templates/404.php';
         } ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script defer>
        let clipboard = new ClipboardJS('.tools-container .tool');

        clipboard.on('success', (e) => {
            alert(e.trigger.innerText + "\ncopié dans le presse papier");
        })
    </script>
    <script src="views/js/app.js" defer></script>
</body>
</html>