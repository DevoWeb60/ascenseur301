<?php if (isset($_SESSION['user']) && isset($_SESSION['connected']) && isset($userTodos)) : ?>

    <div class="users-list">
        <h2>Utilisateurs</h2>
        <ul>
            <li>
                <a href="<?= $pages['Accueil'] ?>" class="current-user"><?= ucfirst($_SESSION['user']['username']) ?></a>
            </li>
            <?php foreach ($users as $user) :
                if ($user['id'] != $_SESSION['user']['id']) : ?>
                    <li>
                        <a href="index.php?page=Accueil&user=<?= $user['id'] ?>"><?= ucfirst($user['username']) ?></a>
                    </li>
            <?php endif;
            endforeach; ?>
        </ul>
        <a href="<?= $pages['logout'] ?>" class="btn secondary mt-20">Déconnexion</a>
    </div>

    <?php if (isset($_GET['user']) && isset($otherTodos) && isset($otherUser)) : ?>
        <div class="todo-list">
            <h2><?= ucfirst($otherUser['username']) ?></h2>
            <ul class="todos">
                <?php foreach ($otherTodos as $todo) : ?>
                    <li class="todo">
                        <span></span>
                        <input type="checkbox" id="<?= $todo['id'] ?>" disabled name="task[<?= $todo['id'] ?>]" <?= $todo['checked'] == 1 ? 'checked' : '' ?> value="1">
                        <label class="todo-text" for="<?= $todo['id'] ?>"><?= $todo['name'] ?></label>
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
                            <span></span>
                            <input type="checkbox" id="<?= $todo['id'] ?>" name="task[<?= $todo['id'] ?>]" <?= $todo['checked'] == 1 ? 'checked' : '' ?> value="1">
                            <label class="todo-text" for="<?= $todo['id'] ?>"><?= $todo['name'] ?></label>
                            <a href="index.php?page=Accueil&update=<?= $todo['id'] ?>" class="update"><i class="fas fa-edit"></i></i></a>
                            <a href="index.php?page=delete&id=<?= $todo['id'] ?>" class="delete"><i class="far fa-times-circle"></i></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <input type="hidden" name="update" value="1">
                <div class="btn-container">
                    <button type="submit" class="btn primary">Mettre à jour</button>
                </div>
            </form>
            <?php if (isset($_GET['update']) && !empty($_GET['update']) && filter_var($_GET['update'], FILTER_VALIDATE_INT)) : ?>
                <form action="index.php" method="POST" class="addTask">
                    <div class="form-group">
                        <input type="text" name="update_todo" id="todo" placeholder="CSS" value="<?= $updateTask['name'] ?>">
                        <input type="hidden" name="update_todo_id" value="<?= $updateTask['id'] ?>">
                        <label for="todo">Modifier cette tâche</label>
                    </div>
                    <div class="btn-container">
                        <button type="submit" class="btn primary">Modifier</button>
                    </div>
                    <div class="btn-container">
                        <a href="<?= $pages['Accueil'] ?>" class="btn secondary outline">Annuler</a>
                    </div>
                </form>
            <?php else : ?>
                <form action=" index.php" method="POST" class="addTask">
                    <div class="form-group">
                        <input type="text" name="add_todo" id="todo" placeholder="CSS">
                        <label for="todo">Ajouter une tâche</label>
                    </div>
                    <div class="btn-container">
                        <button type="submit" class="btn primary">Ajouter</button>
                    </div>
                </form>
            <?php endif; ?>
            <?php if (isset($_GET['error']) && !empty($_GET['error'])) : ?>
                <p class="error"><?= strSecur($_GET['error']) ?></p>
            <?php endif; ?>
        </div>


    <?php endif; ?>
<?php endif; ?>