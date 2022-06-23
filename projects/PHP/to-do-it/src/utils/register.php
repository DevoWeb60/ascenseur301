<?php

if (isset($_POST['subscribe']) && $_POST['subscribe'] == 1) {
    $username = strSecur($_POST['username']);
    $password = strSecur($_POST['password']);
    $confirmPassword = strSecur($_POST['confirmPassword']);

    $user = $db->prepare('SELECT * FROM users WHERE username = ?');
    $user->execute([$username]);
    $getUser = $user->fetch();

    if (!$getUser) {
        if ($password == $confirmPassword) {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $db->prepare('INSERT INTO users (username, password) VALUES (?, ?)')->execute([$username, $password]);
            $success = "Inscription réussie";
        } else {
            $error = "Les mots de passe ne correspondent pas";
        }
    } else {
        $error = "Identifiant déjà utilisé";
    }
}
