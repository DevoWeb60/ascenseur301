<?php

if (isset($_POST['subscribe']) && $_POST['subscribe'] == 1) {
    $username = strSecur($_POST['username']);
    $password = strSecur($_POST['password']);
    $confirmPassword = strSecur($_POST['confirmPassword']);

    $user = $db->prepare('SELECT * FROM users WHERE username = ?');
    $user->execute([$username]);
    $getUser = $user->fetch();

    if (preg_match("/[a-zA-Z]+/", $username)) {
        if (!$getUser) {
            if (!empty($username)) {
                if (!empty($password)) {
                    if (!empty($confirmPassword)) {
                        if ($password == $confirmPassword) {
                            $password = password_hash($password, PASSWORD_DEFAULT);
                            $db->prepare('INSERT INTO users (username, password) VALUES (?, ?)')->execute([$username, $password]);
                            $success = "Inscription réussie";
                        } else {
                            $error = "Tu sais pas écrire ou quoi&nbsp;? Les mots de passe ne correspondent pas";
                        }
                    } else {
                        $error = "Confirme ton mot de passe narvalo&nbsp;!";
                    }
                } else {
                    $error = "Hey&nbsp;! C'est pas la porte ouverte ton compte&nbsp;! Met un mot de passe&nbsp;!";
                }
            } else {
                $error = "Je suis censé s'avoir qui t'es moi&nbsp;?! Entre un identifiant&nbsp;!";
            }
        } else {
            $error = "T'es pas original mon gars&nbsp;! Cet identifiant est déjà pris";
        }
    } else {
        $error = "Des lettres&nbsp;! Seulement des lettres";
    }
}
