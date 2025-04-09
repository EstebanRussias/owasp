<?php
require_once("./models/CRUD.php");
require_once("./services/response.php");

$template = './views/pages/illustration_add.php';

$errors = [];
$successes = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
    $successes = [];

    if (isset($_POST['description']) && trim($_POST['description']) !== '') {
        $description = $_POST['description'];
    } else {
        $errors[] = "Le champ 'Description' est obligatoire.";
    }

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        $errors[] = "ID du livre invalide.";
    } else {
        $id_book = intval($_GET['id']);
    }

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $allowedTypes = ['image/jpeg', 'image/png'];
        $maxSize = 2 * 1024 * 1024; // 2 Mo

        $fileType = mime_content_type($_FILES['photo']['tmp_name']);
        $fileSize = $_FILES['photo']['size'];
        $filename = basename($_FILES['photo']['name']);
        $folder_location = "assets/illustrations/" . $filename;

        if (!in_array($fileType, $allowedTypes)) {
            $errors[] = "Format de fichier non autorisé. Seuls les fichiers JPG et PNG sont acceptés.";
        }

        if ($fileSize > $maxSize) {
            $errors[] = "Le fichier est trop volumineux. Taille max : 2 Mo.";
        }

        if (empty($errors)) {
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $folder_location)) {
                $uploaded = true;
            } else {
                $errors[] = "Erreur lors du téléchargement du fichier.";
            }
        }
    } else {
        $errors[] = "Aucun fichier sélectionné ou erreur d'upload.";
    }

    $isCover = isset($_POST['is_Cover']) ? 1 : 0;
    $description = $_POST['description'];

    if (empty($errors) && createIllustration($description , $filename , $isCover, $id_book)) {
        $successes[] = "Illustration ajoutée avec succès !";
    }
}

?>