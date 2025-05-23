<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produit = $_POST['id_produit'];

    // Créer le panier si vide
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    // Ajouter ou incrémenter la quantité du produit
    if (isset($_SESSION['panier'][$id_produit])) {
        $_SESSION['panier'][$id_produit]++;
    } else {
        $_SESSION['panier'][$id_produit] = 1;
    }

    // Rediriger vers l'accueil (ou une autre page)
    header("Location: accueil.php");
    exit();
}
?>