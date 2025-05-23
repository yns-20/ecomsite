<?php
session_start();
include 'connexion.php';
$lien = connectMaBasi();

$sql = "SELECT * FROM produits";
$result = mysqli_query($lien, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Produits</title>
    <style>
        .produit {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 250px;
            display: inline-block;
        }
        img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>Bienvenue client</h1>
    <a href="voirpanier.php">Voir le panier</a>
    <h2>Produits disponibles :</h2>

    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="produit">
            <img src="images/produits/<?= $row['image'] ?>" alt="<?= $row['nom'] ?>">
            <h3><?= $row['nom'] ?></h3>
            <p><?= $row['description'] ?></p>
            <p>Prix : <?= $row['prix'] ?> DH</p>
            <form method="post" action="panier.php">
                <input type="hidden" name="id_produit" value="<?= $row['id'] ?>">
                <input type="submit" value="Ajouter au panier">
            </form>
        </div>
    <?php } ?>
</body>
</html>
<?php mysqli_close($lien); ?>