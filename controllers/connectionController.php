<?php
require_once('./models/CRUD.php');
require_once("./services/response.php");
require_once("./services/mailBox.php"); // Envoi d'emails
require_once('./models/connection.php'); // Connexion à la base de données

$template = './views/pages/connection.php';
session_start();

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = getUserByMail($email);
    if (password_verify($password, $user['password'])) {
        // Vérification avec le code  
        $_SESSION['2fa_email'] = $email;
        $_SESSION['2fa_code'] = rand(100000, 999999);

        fakeMailSend($user['email'], "Code de connexion", "Votre code de connexion est : " . $_SESSION['2fa_code']);

        redirect('2fa_verification'); 
    } else {
        $feedback = [
            'type' => 'error',
            'message' => "Email ou mot de passe incorrect.",
        ];
    }
}
?>
