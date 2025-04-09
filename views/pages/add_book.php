<div class="container">
        
        <form method="POST" action="">
                <h2>Ajouter un livre</h2>
                <label for="isbn">ISBN:</label><br>
                <input type="number" id="isbn" name="isbn" required><br><br>
                
                <label for="title">Titre:</label><br>
                <input type="text" id="title" name="title" required><br><br>
            
                <label for="summary">Résumé:</label><br>
                <textarea id="summary" name="summary"></textarea><br><br>
            
                <label for="publication_year">Année de publication:</label><br>
                <input type="number" id="publication_year" name="publication_year" required><br><br>
                <?php if (!empty($feedback)): ?>
                <div class="alert <?= $feedback['type'] === 'success' ? 'alert-success' : 'alert-error'; ?>">
                        <?= $feedback['message']; ?>
                </div>
                <?php endif; ?>
                <input type="submit" name="add_book" value="Ajouter le livre">
        </form>
</div>