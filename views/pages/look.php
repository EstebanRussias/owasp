<?php foreach ($books as $book) : ?>
    <div class="card">
        <div class="card-body">            
            <?php if (!empty($book['filename'])) : ?>
                <img src="assets/illustrations/<?= htmlspecialchars($book['filename']) ?>" alt="Illustration du livre" class="card-img">
            <?php else : ?>
                <p>Pas d'illustration disponible</p>
            <?php endif; ?>
            <div>
                <h5 class="card-title"><?= $book['title'] ?></h5>
                <p class="card-text"><?= $book['summary'] ?></p>
                <p class="card-text"><?= $book['publication_year'] ?></p>
                <div class="les-btn">
                    <a class="btn btn-primary">Voir le livre</a>
                    <a class="btn btn-edit" href="index.php?page=illustration_add&id=<?= $book['book_id']?>">📷</a>
                    <a class="btn btn-edit" href="index.php?page=update&id=<?= $book['book_id']?>">✏️</a>
                    <a class="btn btn-delete" href="index.php?page=delete&id=<?= $book['book_id']?>">🗑️</a>
            </div>


            </div>

        </div>
    </div>
<?php endforeach; ?>
