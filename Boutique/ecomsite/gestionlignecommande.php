<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: authentification.php");
    exit;
}
include 'connexion.php';
$conn = connectMaBasi();

// Supprimer une ligne de commande
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];
    $stmt = $conn->prepare("DELETE FROM lignes_commande WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion des lignes de commande</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            padding: 20px;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #222;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: red;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #555;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover {
            background-color: #333;
        }
    </style>
</head>
<body>

<h1>Lignes de commande</h1>

<table>
    <tr>
        <th>ID</th>
        <th>ID Commande</th>
        <th>ID Produit</th>
        <th>Quantité</th>
        <th>Prix total (€)</th>
        <th>Action</th>
    </tr>

    <?php
    // On récupère juste les colonnes de lignes_commande
    $sql = "SELECT id, id_commande, id_produit, quantite, prix_total FROM lignes_commande ORDER BY id DESC";
    $stmt = $conn->query($sql);

    foreach ($stmt as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['id_commande']}</td>
                <td>{$row['id_produit']}</td>
                <td>{$row['quantite']}</td>
                <td>{$row['prix_total']} €</td>
                <td><a href='?supprimer={$row['id']}' onclick=\"return confirm('Supprimer cette ligne ?')\">Supprimer</a></td>
              </tr>";
    }
    ?>
</table>

<a class="back-btn" href="admin.php">← Retour à l'administration</a>

</body>
</html>