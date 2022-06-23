<form method="POST" class="auth-form" action="">
    <h2>TO DO IT</h2>
    <div class="form-group">
        <input type="text" name="username" placeholder="Identifiant">
        <label for="username">Identifiant</label>
    </div>
    <div class="form-group">
        <input type="password" name="password" placeholder="Mot de passe">
        <label for="password">Mot de passe</label>
    </div>
    <input type="hidden" name="connexion" value="1">
    <div class="btn-container">
        <a href="<?= $pages['Inscription'] ?>" class="btn secondary outline">S'inscrire</a>
        <input type="submit" value="Se connecter" class="btn primary">
    </div>
    <?php if (isset($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>
</form>