<?php
require_once('./models/CRUD.php');
require_once('./services/response.php');

$feedback = []; 

// Vérification de l'ID
if (!isset($_GET['id']) || intval($_GET['id']) === 0) {
    redirect('look');
}

$book = getBook($_GET['id']);

if (!$book) {
    redirect('look');
}

// Pré-remplissage du formulaire
$isbn = $book['isbn'];
$title = $book['title'];
$summary = $book['summary'];
$publication_year = $book['publication_year'];

if (
    !empty($_POST['isbn']) &&
    !empty($_POST['title']) &&
    !empty($_POST['summary']) &&
    !empty($_POST['publication_year'])
) {
    if (strlen($_POST['isbn']) !== 13) {
        $feedback = [
            'type' => 'error',
            'message' => "L'ISBN doit contenir 13 chiffres",
        ];
    } elseif (strlen($_POST['title']) < 2) {
        $feedback = [
            'type' => 'error',
            'message' => "Le titre doit contenir au moins 2 caractères",
        ];
    } else {
        $result = updateBook($_POST['isbn'], $_POST['title'], $_POST['summary'], $_POST['publication_year'], $_GET['id']);
        if ($result) {
            $feedback = [
                'type' => 'success',
                'message' => "Livre mis à jour avec succès !",
            ];
            // Met à jour les valeurs affichées dans le formulaire
            $isbn = $_POST['isbn'];
            $title = $_POST['title'];
            $summary = $_POST['summary'];
            $publication_year = $_POST['publication_year'];
        } else {
            $feedback = [
                'type' => 'error',
                'message' => "Oups, il y a eu un problème...",
            ];
        }
    }
}

$template = "./views/pages/update.php";

const SEO = [
    "title" => "Modifier un livre",
    "description" => "Modification des informations d'un livre",
];
