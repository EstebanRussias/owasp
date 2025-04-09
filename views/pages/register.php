
<div class="container">

    <form action="" method="POST">
        <h2>Inscription</h2>

        <label for="last_name">Nom :</label><br>
        <input type="text" name="last_name" required><br><br>

        <label for="first_name">Prenom :</label><br>
        <input type="text" name="first_name" required><br><br>

        <label for="birth_date">Date de naissance :</label><br>
        <input type="date" name="birth_date" required><br><br>

        <label for="email">Email :</label><br>
        <input type="email" name="email" required><br><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>

        <label for="confirm_password">Confirmer le mot de passe :</label><br>
        <input type="password" name="confirm_password" required><br><br>
        <?php if (!empty($feedback)): ?>
                <div class="alert <?= $feedback['type'] === 'success' ? 'alert-success' : 'alert-error'; ?>">
                        <?= $feedback['message']; ?>
                </div>
                <?php endif; ?>

    
        <input type="submit" value="S'inscrire">    
        
    </form>
</div>