<?php
require_once("./models/articleManager.php");
require_once("./services/response.php");
$template = './views/pages/info.php';

if(!isset($_GET['id']) || intval($_GET['id']) === 0){
    redirect('home');
}

$article = getArticle($_GET['id']);


if(!$article){
    redirect('home');
}

$template = "./views/pages/info.php";