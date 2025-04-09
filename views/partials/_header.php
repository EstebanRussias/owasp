<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <nav id="navbar">
        <ul>
            <li><a href="index.php?page=look">Les livres</a></li>
            <li><a href="index.php?page=add_book">Ajouter un livre</a></li>
            <li><a href="index.php?page=compte">Mon Compte</a></li>
        </ul>
    </nav>
</header>
