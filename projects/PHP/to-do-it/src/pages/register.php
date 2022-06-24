<form method="POST" class="auth-form" action="">
    <h2>Inscription</h2>
    <div class="form-group">
        <input type="text" name="username" placeholder="Identifiant" value="<?= isset($_POST['username']) ? strSecur($_POST['username']) : "" ?>">
        <label for="username">Identifiant</label>
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Mot de passe">
        <label for="password">Mot de passe</label>
    </div>
    <div class="form-group">
        <input type="password" name="confirmPassword" placeholder="Mot de passe">
        <label for="password">Confirmer le mot de passe</label>
    </div>
    <input type="hidden" name="subscribe" value="1">
    <div class="btn-container">
        <a href="<?= $pages['Connexion'] ?>" class="btn secondary outline">Retour</a>
        <input type="submit" value="S'inscrire" class="btn primary">
    </div>
    <?php if (isset($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <?php if (isset($success)) : ?>
        <p class="success"><?= $success ?></p>
    <?php endif; ?>
</form>