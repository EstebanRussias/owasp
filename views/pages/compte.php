<div class="container">
    <h1>Mon compte</h1>
    <div>
        <p>Bienvenue, <?php echo htmlspecialchars($user['first_name']); ?> !</p>
        <p>Voici les informations de votre compte :</p>
        <ul>
            <li><strong>Email :</strong> <?php echo htmlspecialchars($user['email']); ?></li>
            <li><strong>Prénom :</strong> <?php echo htmlspecialchars($user['first_name']); ?></li>
            <li><strong>Nom :</strong> <?php echo htmlspecialchars($user['last_name']); ?></li>
            <li><strong>Date de naissance :</strong> <?php echo htmlspecialchars($user['birth_date']); ?></li>
        </ul>
    </div>
    <div class="actions">
        <a href="index.php?page=suprAll" id="important" class="btn btn-primary">Supprimer tout les comptes !!</a>
        <a href="index.php?page=logout" class="btn btn-secondary">Déconnexion</a>
   
        
    

</div>