<?php
require_once('./models/CRUD.php');
require_once("./services/response.php");

session_start();
if ($_SESSION['etatconnection'] == false) {
    redirect('connection');
}


$feedback = []; 

if (
    !empty($_POST['isbn']) &&
    !empty($_POST['title']) &&
    !empty($_POST['summary']) &&
    !empty($_POST['publication_year'])
) {
    $isbn = filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $summary = filter_input(INPUT_POST, 'summary', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $year = filter_input(INPUT_POST, 'publication_year', FILTER_SANITIZE_NUMBER_INT);


    if (strlen($_POST['isbn']) !== 13) {
        $feedback = [
            'type' => 'error',
            'message' => "L'ISBN doit contenir 13 chiffres",
        ];
    }

    elseif (strlen($_POST['title']) < 2) {
        $feedback = [
            'type' => 'error',
            'message' => "Le titre doit contenir au moins 2 caractères",
        ];
    }

    else {
        $result = createBook($_POST['isbn'], $_POST['title'], $_POST['summary'], $_POST['publication_year']);
        if ($result) {
            $feedback = [
                'type' => 'success',
                'message' => "Livre publié !",
            ];
        } else {
            $feedback = [
                'type' => 'error',
                'message' => "Oups, il y a eu un problème...",
            ];
        }
    }
}

$template = "./views/pages/add_book.php";

