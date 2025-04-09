<?= $_SESSION['2fa_code'] ?>
<div class="container">

    <form action="" method="POST">
        <h2>Code de vérification</h2>

        <label for="code_user">Entrer le code :</label><br>
        <input type="int" name="code_user" required><br><br>
        <?php if (!empty($feedback)): ?>
                <div class="alert <?= $feedback['type'] === 'success' ? 'alert-success' : 'alert-error'; ?>">
                        <?= $feedback['message']; ?>
                </div>
                <?php endif; ?>

        <input type="submit" value="Valider">
    </form>
</div>