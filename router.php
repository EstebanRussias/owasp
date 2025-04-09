<?php

require_once('./config/routes.php');

$availableRoutesNames =array_keys(AVAILABLE_ROUTES);

if (isset($_GET['page']) && in_array($_GET['page'], $availableRoutesNames,true) ) {
    $controller = AVAILABLE_ROUTES[$_GET['page']]['template'];
    $SEO = AVAILABLE_ROUTES[$_GET['page']]['SEO'];

    } else {
    $controller = DEFAULT_ROUTES['template'];
    $SEO = DEFAULT_ROUTES['SEO'];
    
}


require './controllers/'. $controller;