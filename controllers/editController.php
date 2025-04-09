<?php
require_once("./models/articleManager.php");
require_once("./services/response.php");
$template = './views/pages/edit.php';
session_start();
if ($_SESSION['etatconnection'] === true) {
    if(!isset($_GET['id']) || intval($_GET['id']) === 0){
        redirect('home');
    }
    
    $article = getArticle($_GET['id']);
    
    
    if(!$article){
        redirect('home');
    }
    
    
    if (
        !empty($_POST['title']) &&
        !empty($_POST['description']) &&
        !empty($_POST['content'])
    ) {
        $result = updateArticle($_GET['id'], $_POST['title'], $_POST['description'], $_POST['content']);
        if ($result) {
            redirect('home');
            $feedback = [
                'type' => 'success',
                'message' => "Article publié !",
            ];
        } else {
            $feedback = [
                'type' => 'error',
                'message' => "Oups il y a eu un problème ... ",
            ];
        }
    }
     
}else{
    redirect('connection');
}



$template = "./views/pages/edit.php";