<?php

const ENV = "dev";

if (ENV === "dev") {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    define("HOST","localhost");
    define("PORT","3306");
    define("DBNAME","MediaTek");
    define("USERNAME","root");
    define("PASSWORD","");
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
    define("HOST","localhost");
    define("PORT","3306");
    define("DBNAME","MediaTek");
    define("USERNAME","root");
    define("PASSWORD","");

}


?>


