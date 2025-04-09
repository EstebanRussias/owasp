<?php
require_once("./services/response.php");
session_start();
session_destroy();
redirect('look');
?>
