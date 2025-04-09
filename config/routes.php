<?php

const AVAILABLE_ROUTES = [
    
    "look" => [
        "template"=> "lookController.php",
        "SEO" =>[
            "title"=> "Look",
            "description"=> "Ma meta ...",    
        ],
    ],
    "illustration_add" => [
        "template"=> "illustration_addController.php",
        "SEO" =>[
            "title"=> "Add illustration",
            "description"=> "Ma meta ...",    
        ],
    ],
    "delete" => [
        "template"=> "deleteController.php",
        "SEO" =>[
            "title"=> "Delete",
            "description"=> "Ma meta ...",    
        ],
    ],
    "update" => [
        "template"=> "updateController.php",
        "SEO" =>[
            "title"=> "Update",
            "description"=> "Ma meta ...",    
        ],
    ],
    "register" => [
        "template"=> "registerController.php",
        "SEO" =>[
            "title"=> "Register",
            "description"=> "Ma meta ...",    
        ],
    ],
    "verification" => [
        "template"=> "verificationController.php",
        "SEO" =>[
            "title"=> "Vérification",
            "description"=> "Ma meta ...",    
        ],
    ],
    "logout" => [
        "template"=> "logoutController.php",
        "SEO" =>[
            "title"=> "Logout",
            "description"=> "Ma meta ...",    
        ],
    ],

    "connection" => [
        "template"=> "connectionController.php",
        "SEO" =>[
            "title"=> "Connection",
            "description"=> "Ma meta ...",    
        ],
    ],
    "2fa_verification" => [
        "template"=> "2fa_verificationController.php",
        "SEO" =>[
            "title"=> "2fa_verification",
            "description"=> "Ma meta ...",    
        ],
    ],
    "add_book" => [
        "template"=> "add_bookController.php",
        "SEO" =>[
            "title"=> "Add book",
            "description"=> "Ma meta ...",    
        ],
    ],
    "compte" => [
        "template"=> "compteController.php",
        "SEO" =>[
            "title"=> "Compte",
            "description"=> "Ma meta ...",    
        ],
    ],
    "suprAll" => [
        "template"=> "deleteAllController.php",
        "SEO" =>[
            "title"=> "SuprAll",
            "description"=> "Ma meta ...",    
        ],
    ],
    ];


const DEFAULT_ROUTES = AVAILABLE_ROUTES["look"];