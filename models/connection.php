<?php

require_once './env.php';
function dbConnect() {
    try {
        $db = new PDO(
            'mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME,
            USERNAME,
            PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->exec('SET NAMES utf8');
        return $db;
    } catch (PDOException $e) {
        error_log("Erreur de connexion : " . $e->getMessage());
        die("Erreur de connexion à la base de données");
    }
}
