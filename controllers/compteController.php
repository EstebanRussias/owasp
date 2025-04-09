<?php
   $template = './views/pages/compte.php';
   require_once('./models/CRUD.php');
   require_once("./services/response.php");

   session_start();
   if ($_SESSION['etatconnection'] == true) {
        $user = getInformationUser($_SESSION['user_email']);
        
        

        
} else {
       redirect('connection'); 
         
   }


?>
