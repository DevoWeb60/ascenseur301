<?php
if (isset($_SESSION['connected'])) {
    $todos = $db->prepare('SELECT * FROM todo WHERE user_id = ?');
    $todos->execute([$_SESSION['user']['id']]);
    $userTodos = $todos->fetchAll();

    $allUsers = $db->prepare('SELECT username, id FROM users');
    $allUsers->execute([]);
    $users = $allUsers->fetchAll();
}

if (isset($_GET['user']) && !empty($_GET['user']) && $_GET['user'] > 0 && $_GET['user'] != $_SESSION['user']['id']) {
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
    redirectTo($pages['Accueil']);
}

if ($title == "delete" && isset($_GET['id']) && !empty($_GET['id'])) {
    $id = strSecur($_GET['id']);
    $todo = $db->prepare('DELETE FROM todo WHERE id = ? AND user_id = ?');
    $todo->execute([$id, $_SESSION['user']['id']]);
    if ($todo->rowCount() == 1) {
        redirectTo($pages['Accueil']);
    } else {
        redirectTo($pages['Accueil'] . '&amp;error=Essaie pas de supprimer les todos des autres dis donc !');
    }
}

if (isset($_POST['update']) && $_POST['update'] == 1) {
    $db->prepare('UPDATE todo SET checked = 0')->execute([]);
    foreach ($_POST['task'] as $todoId => $checked) {
        $task = strSecur($checked);
        $todo = $db->prepare('UPDATE todo SET checked = ? WHERE id = ? AND user_id = ?');
        $todo->execute([$checked, $todoId, $_SESSION['user']['id']]);
    }
    redirectTo($pages['Accueil']);
}

if (isset($_GET['update']) && !empty($_GET['update']) && filter_var($_GET['update'], FILTER_VALIDATE_INT)) {
    $id = strSecur($_GET['update']);
    $getUpdateTask = $db->prepare('SELECT name, id FROM todo WHERE id = ? AND user_id = ?');
    $getUpdateTask->execute([$id, $_SESSION['user']['id']]);
    $updateTask = $getUpdateTask->fetch();
    if (!$updateTask) {
        redirectTo($pages['Accueil'] . "&error=Cette todo n'existe pas ou ne t'appartient pas petit chenapan !");
    }
}

if (isset($_POST['update_todo']) && isset($_POST['update_todo_id'])) {
    if (!empty($_POST['update_todo'])) {
        $updatedName = strSecur($_POST['update_todo']);
        $id = strSecur($_POST['update_todo_id']);
        $db->prepare('UPDATE todo SET name = ? WHERE id = ? AND user_id = ?')->execute([$updatedName, $id, $_SESSION['user']['id']]);
        redirectTo($pages['Accueil']);
    } else {
        redirectTo($pages['Accueil'] . "&error=Cette todo ne t'appartient pas petit saligaud");
    }
}
