<?php
session_start();
require_once('connexion.php');

$conn = connectMaBasi();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id_utilisateur'])) {
    header("Location: login.php");
    exit();
}

// Vérifier que le panier contient des produits
if (!isset($_SESSION['panier']) || count($_SESSION['panier']) == 0) {
    echo "<p style='text-align:center;'>Votre panier est vide.</p>";
    exit();
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $methode = $_POST['paiement'];

    // Insérer la commande
    $stmt = $conn->prepare("INSERT INTO commandes (id_utilisateur, methode_paiement) VALUES (?, ?)");
    $stmt->bind_param("is", $_SESSION['id_utilisateur'], $methode);
    $stmt->execute();
    $id_commande = $stmt->insert_id;

    // Insérer les lignes de commande
    foreach ($_SESSION['panier'] as $id_produit => $quantite) {
        $produit = $conn->prepare("SELECT prix FROM produits WHERE id = ?");
        $produit->bind_param("i", $id_produit);
        $produit->execute();
        $res = $produit->get_result()->fetch_assoc();
        $prix = $res['prix'];
        $total = $prix * $quantite;

        $ligne = $conn->prepare("INSERT INTO lignes_commande (id_commande, id_produit, quantite, prix_total) VALUES (?, ?, ?, ?)");
        $ligne->bind_param("iiid", $id_commande, $id_produit, $quantite, $total);
        $ligne->execute();
    }

    // Vider le panier
    unset($_SESSION['panier']);

    // Confirmation
    echo "<p style='text-align:center; color:green;'>Votre commande a été enregistrée avec succès. Merci pour votre achat !</p>";
    echo "<p style='text-align:center;'><a href='accueil.php'>Retour à l'accueil</a></p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Valider la commande</title>
    <style>
        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        label, select, input[type=submit] {
            display: block;
            width: 100%;
            margin-top: 10px;
        }
        input[type=submit] {
            padding: 10px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<form method="POST">
    <h3>Choisissez votre méthode de paiement</h3>
    
    <label>
        <select name="paiement" required>
            <option value="">-- Sélectionner un mode de paiement --</option>
            <option value="livraison">Paiement à la livraison</option>
            <option value="carte">Carte bancaire</option>
        </select>
    </label>

    <input type="submit" value="Valider la commande">
</form>

</body>
</html>