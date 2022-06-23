<?php
if (isset($_SESSION['connected'])) {
    $todos = $db->prepare('SELECT * FROM todo WHERE user_id = ?');
    $todos->execute([$_SESSION['user']['id']]);
    $userTodos = $todos->fetchAll();

    $allUsers = $db->prepare('SELECT username, id FROM users');
    $allUsers->execute([]);
    $users = $allUsers->fetchAll();
}

if (isset($_GET['user']) && !empty($_GET['user'])) {
    $userId = strSecur($_GET['user']);
    $allTodos = $db->prepare('SELECT * FROM todo WHERE user_id = ?');
    $allTodos->execute([$userId]);
    $otherTodos = $allTodos->fetchAll();
    $allUsers = $db->prepare('SELECT users.username FROM users WHERE id = ?');
    $allUsers->execute([$userId]);
    $otherUser = $allUsers->fetch();
}


if (isset($_POST['add_todo']) && !empty($_POST['add_todo'])) {
    $newTodo = strSecur($_POST['add_todo']);
    $todo = $db->prepare('INSERT INTO todo (name, user_id) VALUES (?, ?)');
    $todo->execute([$newTodo, $_SESSION['user']['id']]);
    redirectTo('index.php?page=Accueil');
}

if ($title == "delete" && isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strSecur($_GET['id']);
    $todo = $db->prepare('DELETE FROM todo WHERE id = ?');
    $todo->execute([$id]);
    redirectTo('index.php?page=Accueil');
}

if (isset($_POST['update']) && $_POST['update'] == 1) {
    $db->prepare('UPDATE todo SET checked = 0')->execute([]);
    foreach ($_POST['task'] as $id => $checked) {
        $task = strSecur($checked);
        $todo = $db->prepare('UPDATE todo SET checked = ? WHERE id = ?');
        $todo->execute([$checked, $id]);
    }

    redirectTo('index.php?page=Accueil');
}
