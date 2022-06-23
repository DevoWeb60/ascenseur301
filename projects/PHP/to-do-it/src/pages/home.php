<?php if (isset($_SESSION['user']) && isset($_SESSION['connected']) && isset($userTodos)) : ?>

    <?php if (isset($_GET['user']) && isset($otherTodos) && isset($otherUser)) : ?>
        <div class="todo-list">
            <h2><?= ucfirst($otherUser['username']) ?></h2>
            <ul class="todos">
                <?php foreach ($otherTodos as $todo) : ?>
                    <li class="todo">
                        <input type="checkbox" disabled name="task[<?= $todo['id'] ?>]" <?= $todo['checked'] == 1 ? 'checked' : '' ?> value="1">
                        <span class="todo-text"><?= $todo['name'] ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php else : ?>
        <div class="todo-list">
            <h2><?= ucfirst($_SESSION['user']['username']) ?> </h2>
            <form action="index.php" method="POST">
                <ul class="todos">
                    <?php foreach ($userTodos as $todo) : ?>
                        <li class="todo">
                            <input type="checkbox" name="task[<?= $todo['id'] ?>]" <?= $todo['checked'] == 1 ? 'checked' : '' ?> value="1">
                            <span class="todo-text"><?= $todo['name'] ?></span>
                            <a href="index.php?page=delete&id=<?= $todo['id'] ?>" class="delete"><i class="far fa-times-circle"></i></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <input type="hidden" name="update" value="1">
                <div class="btn-container">
                    <button type="submit" class="btn primary">Mettre à jour</button>
                </div>
            </form>
            <form action="index.php" method="POST" id="addTask">
                <div class="form-group">
                    <input type="text" name="add_todo" id="todo" placeholder="CSS">
                    <label for="todo">Ajouter une tâche</label>
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn primary">Ajouter</button>
                </div>
            </form>
        </div>


    <?php endif; ?>

    <div class="users-list">
        <h2>Utilisateurs</h2>
        <ul>
            <?php foreach ($users as $user) :
                if ($user['id'] == $_SESSION['user']['id']) : ?>
                    <li>
                        <a href="<?= $pages['Accueil'] ?>" class="current-user"><?= ucfirst($user['username']) ?></a>
                    </li>
                <?php else : ?>
                    <li>
                        <a href="index.php?page=Accueil&user=<?= $user['id'] ?>"><?= ucfirst($user['username']) ?></a>
                    </li>
            <?php endif;
            endforeach; ?>
        </ul>
        <a href="<?= $pages['logout'] ?>" class="btn secondary mt-20">Déconnexion</a>
    </div>

<?php endif; ?>