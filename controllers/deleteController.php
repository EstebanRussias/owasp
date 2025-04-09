<?php
require_once('./models/CRUD.php');
require_once("./services/response.php");
$template = './views/pages/delete.php';


if(!isset($_GET['id']) || intval($_GET['id']) === 0){
    redirect('look');
}

deleteBook($_GET['id']);

redirect('look');
