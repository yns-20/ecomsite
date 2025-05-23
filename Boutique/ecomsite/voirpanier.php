<?php
session_start();
include 'connexion.php';
$lien = connectMaBasi();

$panier = $_SESSION['panier'] ?? [];

echo "<h1>Votre Panier</h1>";

if (empty($panier)) {
    echo "<p>Panier vide.</p>";
    echo "<a href='produits.php'>Retour aux produits</a>";
    exit();
}

$ids = implode(',', array_keys($panier));
$sql = "SELECT * FROM produits WHERE id IN ($ids)";
$result = mysqli_query($lien, $sql);

$total = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $qte = $panier[$row['id']];
    $prix_total = $qte * $row['prix'];
    $total += $prix_total;

    echo "<div><strong>{$row['nom']}</strong><br>
    Prix unitaire : {$row['prix']} DH<br>
    Quantité : $qte<br>
    Total : $prix_total DH<br><hr></div>";
}
echo "<p><strong>Total général : $total DH</strong></p>";
echo "<a href='valider_commande.php'>Valider la commande</a>";

mysqli_close($lien);
?>