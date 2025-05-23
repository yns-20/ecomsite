<?php
session_start();
require_once('connexion.php'); // Assure-toi que cette fonction contient connectMaBasi()

$conn = connectMaBasi();
$message = "";

// Supprimer un produit
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    unset($_SESSION['panier'][$id]);
    $message = "Produit supprimé avec succès.";
}

// Vider le panier
if (isset($_GET['vider'])) {
    unset($_SESSION['panier']);
    $message = "Panier vidé avec succès.";
}

// Modifier les quantités
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    foreach ($_POST['quantite'] as $id => $qte) {
        if ($qte > 0) {
            $_SESSION['panier'][$id] = $qte;
        } else {
            unset($_SESSION['panier'][$id]);
        }
    }
    $message = "Quantités mises à jour.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
    <style>
        .produit {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .total {
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
        .message {
            color: green;
            text-align: center;
        }
        .btn {
            padding: 6px 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<h2>Votre Panier</h2>

<?php if ($message): ?>
    <p class="message"><?= $message ?></p>
<?php endif; ?>

<?php if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0): ?>
    <form method="POST">
        <?php
        $sommeTotale = 0;
        foreach ($_SESSION['panier'] as $id => $qte):
            $stmt = $conn->prepare("SELECT nom, prix, image FROM produits WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $res = $stmt->get_result()->fetch_assoc();
            $totalProduit = $res['prix'] * $qte;
            $sommeTotale += $totalProduit;
        ?>
        <div class="produit">
    <div style="display: flex; align-items: center;">
        <img src="images/produits/<?= htmlspecialchars($res['image']) ?>" alt="<?= htmlspecialchars($res['nom']) ?>" style="width: 80px; height: 80px; object-fit: cover; margin-right: 15px; border-radius: 8px;">
        <div>
            <strong><?= htmlspecialchars($res['nom']) ?></strong><br>
            Prix unitaire : <?= number_format($res['prix'], 2) ?> €<br>
            Total : <?= number_format($totalProduit, 2) ?> €
        </div>
    </div>
    <div>
        Quantité :
        <input type="number" name="quantite[<?= $id ?>]" value="<?= $qte ?>" min="1" style="width: 60px;">
        <a class="btn" href="?supprimer=<?= $id ?>">Supprimer</a>
    </div>
</div>
        <?php endforeach; ?>

        <div class="total">Total général : <?= number_format($sommeTotale, 2) ?> €</div>

        <button type="submit" name="update" class="btn" style="background-color: #007bff;">Mettre à jour</button>
        <a href="?vider=true" class="btn">Vider le panier</a>
        <a href="valider_commande.php" class="btn" style="background-color: green;">Valider la commande</a>
    </form>

<?php else: ?>
    <p style="text-align:center;">Votre panier est vide.</p>
<?php endif; ?>

</body>
</html>