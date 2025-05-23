<?php
session_start();
require_once('connexion.php');
$conn = connectMaBasi();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultat de la recherche</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Reprenez ici les styles de accueil.php pour que ce soit uniforme */
        body { font-family: Arial; background-color: #f8f9fa; margin: 0; padding: 0; }
        .produits-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 20px;
        }
        .card-produit {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            width: 220px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .card-produit img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }
        .btn-panier {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #0d6efd;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn-panier:hover {
            background-color: #0056b3;
        }
        h1 {
            text-align: center;
            margin-top: 100px;
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <h1>Résultats de recherche</h1>
<?php
if (isset($_GET['recherche']) && !empty(trim($_GET['recherche']))) {
    $recherche = $conn->real_escape_string($_GET['recherche']);
    $sql = "SELECT * FROM produits WHERE nom LIKE '%$recherche%' OR description LIKE '%$recherche%'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo '<div class="produits-container">';
        while ($row = $result->fetch_assoc()) {
            echo '
                <div class="card-produit">
                    <img src="./images/produits/' . $row["image"] . '" alt="' . $row["nom"] . '">
                    <h3>' . $row["nom"] . '</h3>
                    <p>' . $row["description"] . '</p>
                    <p><strong>' . number_format($row["prix"], 2) . ' €</strong></p>
                    <form action="ajouter_panier.php" method="POST">
                        <input type="hidden" name="id_produit" value="' . $row["id"] . '">
                        <input type="submit" class="btn-panier" name="ajoutpanier" value="ajouter au panier">
                    </form>
                </div>
            ';
        }
        echo '</div>';
    } else {
        echo "<p style='text-align: center;'>Aucun produit trouvé pour : <strong>$recherche</strong></p>";
    }
} else {
    echo "<p style='text-align: center;'>Veuillez entrer un mot-clé dans la barre de recherche.</p>";
}
?>
</body>
</html>