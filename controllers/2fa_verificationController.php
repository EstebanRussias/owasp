<?php
require_once("./services/response.php");
require_once('./models/CRUD.php');

$template = './views/pages/2fa_verification.php';

session_start();
$_SESSION['etatconnection']= false;

if (!isset($_SESSION['2fa_code']) || !isset($_SESSION['2fa_email'])) {
    redirect('connection'); 
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['code_user'])) {
    if ($_POST['code_user'] == $_SESSION['2fa_code']) {

        $_SESSION['user_email'] = $_SESSION['2fa_email'];
        unset($_SESSION['2fa_code'], $_SESSION['2fa_email']);
        $_SESSION['etatconnection'] = true;
        if (userExist($_SESSION['user_email']) == false){
            createUser($_SESSION['first_name'], $_SESSION['last_name'], $_SESSION['birth_date'], $_SESSION['email'], $_SESSION['password']); 
        }
        redirect('compte'); // Accès accordé
    } else {
        $feedback = [
            'type' => 'error',
            'message' => "Code de vérification incorrect.",
        ];
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedback = [
        'type' => 'error',
        'message' => "Veuillez entrer un code de vérification.",
    ];
}
?>
