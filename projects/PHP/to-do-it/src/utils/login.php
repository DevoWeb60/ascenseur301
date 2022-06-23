<?php

if (isset($_POST['connexion']) && $_POST['connexion'] == 1) {
    $username = strSecur($_POST['username']);
    $password = strSecur($_POST['password']);

    $user = $db->prepare('SELECT * FROM users WHERE username = ?');
    $user->execute([$username]);
    $getUser = $user->fetch();

    if ($getUser) {
        $password = password_verify($password, $getUser['password']);
        if ($password) {
            $_SESSION['connected'] = true;
            $_SESSION['user'] = $getUser;
            redirectTo('index.php?page=Accueil');
        } else {
            $error = "Mot de passe incorrect";
        }
    } else {
        $error = "Identifiant incorrect";
    }
}
