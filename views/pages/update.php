<div class="container">
        
        <form method="POST" action="">
                <h2>Modifier le livre " <?= $book['title'] ?> "</h2>
                <label for="isbn">ISBN:</label><br>
                <input type="number" id="isbn" name="isbn" value="<?= $book['isbn'] ?>"><br><br>
                
                <label for="title">Titre:</label><br>
                <input type="text" id="title" name="title" value="<?= $book['title'] ?>" ><br><br>
            
                <label for="summary">Résumé:</label><br>
                <textarea id="summary" name="summary"><?= htmlspecialchars($book['summary']) ?></textarea><br><br>
            
                <label for="publication_year">Année de publication:</label><br>
                <input type="number" id="publication_year" name="publication_year" value="<?= $book['publication_year'] ?>"><br><br>
                <?php if (!empty($feedback)): ?>
                <div class="alert <?= $feedback['type'] === 'success' ? 'alert-success' : 'alert-error'; ?>">
                        <?= $feedback['message']; ?>
                </div>
                <?php endif; ?>
                <input type="submit" name="update_book" value="Modifier le livre">
        </form>
</div>