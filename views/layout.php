<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $SEO['title']?> - Nom du site</title>
    <meta name="description" content="<?= $SEO['description'] ?>">
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LflnvkqAAAAAGDKM_F1l6mkzvdZMS1NOmkGycWE"></script>
</head>
<body>
    <?php
        require('views/partials/_header.php');
        ?>

    <main>
        <?php
        require($template) ?>
    </main>
    <?php
        require('views/partials/_footer.php');
        ?>

        <!-- Replace the variables below. -->
<script>
  function onSubmit(token) {
    document.getElementById("demo-form").submit();
  }
</script>
</body>
</html>