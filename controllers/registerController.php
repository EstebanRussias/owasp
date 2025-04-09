<?php
require_once('./models/CRUD.php');
require_once("./services/response.php");
require_once("./services/mailBox.php"); // Envoi d'emails

$template = './views/pages/register.php';

session_start();

// Vérification des champs obligatoires
if (
    !empty($_POST['first_name']) &&
    !empty($_POST['last_name']) &&
    !empty($_POST['birth_date']) &&
    !empty($_POST['email']) &&
    !empty($_POST['password']) &&
    !empty($_POST['confirm_password']) 
) {
    // Vérification que les mots de passe correspondent
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $feedback = [
            'type' => 'error',
            'message' => "Les mots de passe ne correspondent pas.",
        ];
    }
    // Vérification des critères du mot de passe
    elseif (!preg_match('/^(?=.*[A-Z])(?=.*\W).{10,}$/', $_POST['password'])) {
        $feedback = [
            'type' => 'error',
            'message' => "Le mot de passe doit contenir au moins 10 caractères, une majuscule et un caractère spécial.",
        ];
    }
    else {
        // Si toutes les vérifications sont OK, création de l'utilisateur en session pour la validation finale
        $_SESSION["first_name"] = $_POST['first_name'];
        $_SESSION["last_name"] = $_POST['last_name'];
        $_SESSION["birth_date"] = $_POST['birth_date'];
        $_SESSION["email"] = $_POST['email'];
        $_SESSION["password"] = $_POST['password'];


        
        // Vérification avec le code  
        $_SESSION['2fa_email'] = $_SESSION["email"];
        $_SESSION['2fa_code'] = rand(100000, 999999);

        fakeMailSend( $_SESSION["email"], "Code de connexion", "Votre code de connexion est : " . $_SESSION['2fa_code']);

        redirect('2fa_verification'); 

    }
} else {
    // Si des champs sont vides
    $feedback = [
        'type' => 'error',
        'message' => "Tous les champs doivent être remplis.",
    ];
}
?>
