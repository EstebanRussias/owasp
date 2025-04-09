<div class="container">
<form action="" method="POST" enctype="multipart/form-data">

    <label for="description">Description de l'image</label>
    <input type="text" name="description" id="description" required>

    <label for="photo">Fichier</label>
    <input type="file" name="photo" id="photo" required accept=".jpg, .jpeg, .png">

    <boite>
        <label for="is_Cover">page de couverture</label>
        <input type="checkbox" name = "is_Cover" id="is_Cover" >
    </boite>

    <input type="submit" value="Soumettre">


    <?php if (!empty($errors)): ?>
        <message class="error-messages">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li style="color: red;"><?php echo htmlspecialchars($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </message>
    <?php endif; ?>
    <?php if (!empty($successes)): ?>
        <message class="error-messages">
            <ul>
                <?php foreach ($successes as $success): ?>
                    <li style="color: green;"><?php echo htmlspecialchars($success); ?></li>
                <?php endforeach; ?>
            </ul>
        </message>
    <?php endif; ?>

</form>
</div>