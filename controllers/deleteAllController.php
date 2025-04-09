<?php
require_once('./models/CRUD.php');
require_once('./services/response.php');


deleteAllUsers();
$_SESSION['etatconnection']= false;
redirect('look');
?>