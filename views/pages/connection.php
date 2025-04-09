<div class="container">
    <form action="" method="POST">
        <h2>Connexion</h2>

        <label for="email">Email :</label><br>
        <input type="email" name="email" required><br><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>

        <?php if (!empty($feedback)): ?>
            <div class="alert <?= $feedback['type'] === 'success' ? 'alert-success' : 'alert-error'; ?>">
                <?= $feedback['message']; ?>
            </div>
        <?php endif; ?>

        <input type="submit" value="Se connecter">
        <a href="index.php?page=register">Crée un compte</a>
    </form>
</div>
