<?php 
session_start();
// Vérifiez si l'utilisateur est connecté
//connexion a la bse de donne 
require_once('connexion.php');

    ?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits à Vendre</title>
    <title>Accueil</title>
  <!-- Import Font Awesome pour l’icône -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body.bg {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #343a40;
        
        }
        body, html {
  overflow-x: hidden;
  margin: 0;
  padding: 0;
  width: 100%;
}
        .texta {
            font-size: 2.5rem;
            font-weight: bold;
            margin-top: 40px;
            text-align: center;
            color: #0d6efd;
        }
        .textp {
            text-align: center;
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 40px;
        }
        #aa {
            position: relative;
            margin: 0 auto;
            max-width: 800px;
            width: 100%;
        }
        .carousel-img {
    width: 100vw;
    max-width: 100%;
    height: 700px;
    object-fit: cover;
    display: block;
    margin: 0 auto;
    border-radius: 0;
}
        .ee, #aa {
    width: 100vw;
    max-width: 100%;
    padding: 0;
    margin: 0 auto;
    overflow: hidden;
    box-sizing: border-box;
}
        .aaaaaa {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background-color: rgba(0,0,0,0.5);
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
        }
        .btn, .btn2 {
            background-color: transparent;
            border: none;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .btn {
            left: 10px;
        }
        .btn2 {
            right: 10px;
        }
        .spn, .spn2 {
            font-size: 2rem;
            color: #fff;
        }
        .hrr {
            border-top: 2px solid #0d6efd;
            margin: 3rem 0 1rem;
        }
        .hrrr {
            text-align: center;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 2rem;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            padding-top: 100px;
            text-align: center;
            max-width: 100%;
            box-sizing: border-box;
            
        }
        .ee {
            margin: 0 auto;
            max-width: 1000px;
            position: relative;
        }
        .aaa {
    position: relative;
    overflow: hidden;
    width: 100vw;
    max-width: 100%;
    margin: 0 auto;
}
        .aaaa {
            position: relative;
            width: 100%;
            transition: transform 0.5s ease;
        }
        .aaaa:hover {
            transform: scale(1.05);
        }
        .btn-fixed-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #0d6efd;
            color: white;
            padding: 12px 20px;
            border-radius: 50px;
            font-weight: bold;
            border: none;
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
            z-index: 1000;
            transition: background-color 0.3s ease;
        }
        .btn-fixed-top:hover {
            background-color: #0056b3;
        }
        .produits-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
    max-width: 100%;
box-sizing: border-box;
}

.card-produit {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    width: 220px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.2s ease;
}

.card-produit:hover {
    transform: scale(1.05);
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
    transition: background-color 0.3s ease;
}

.btn-panier:hover {
    background-color: #0056b3;
}
.top-bar {
    background-color: transparent;
    position: absolute;
    top: 20px;
    right: 20px;
    z-index: 1000;
}
.top-bar input {
    background-color: transparent;
    color: white;
    border: none;
    border-radius: 50px;
    padding: 5px 5px;
    font-size: 1.5rem;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: background-color 0.3s ease;
}

.btn-panier-top {
    background-color: transparent;
    color: white;
    padding: 10px 18px;
    border-radius: 20px;
    text-decoration: none;
    font-weight: bold;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    transition: background-color 0.3s ease;
}

.btn-panier-top:hover {
    background-color: #0056b3;
}
 .header {
      background: #fff;
      padding: 15px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-info i {
      font-size: 24px;
      color: #555;
      cursor: pointer;
      transition: color 0.3s;
    }

    .user-info i:hover {
      color: #007bff;
    }

    .username {
      font-size: 16px;
      color: #333;
    }
    .main-header {
  width: 100%;
  background-color: #ffffff;
    padding: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: fixed;
  top: 0;
  z-index: 1000;
  max-width: 100%;
box-sizing: border-box;
}

.header-left .logo {
  font-size: 24px;
  font-weight: bold;
  color: #0d6efd;
  text-decoration: none;
}

.header-right {
  display: flex;
  gap: 20px;
  align-items: center;
}

.header-icon {
  font-size: 24px;
  color: #333;
  text-decoration: none;
  transition: color 0.3s ease;
}

.header-icon:hover {
  color: #0d6efd;
}



    </style>
</head>
<body class="bg">
<header class="main-header">
  <div class="header-left">
    <a href="accueil.php" class="logo">⚽Planéte_Sport</a>
  </div>
  <div class="header-right">
    <a href="panier.php" class="header-icon" title="Panier">
      <i class="fas fa-shopping-cart"></i>
    </a>
    <?php if (isset($_SESSION['id'])): ?>
  <a href="profil.php" class="header-icon" title="Mon Profil" style="display: flex; align-items: center; gap: 5px;">
    <i class="fas fa-user-circle"></i><span>Mon Profil</span>
  </a>
<?php else: ?>
  <a href="authentification.php" class="header-icon" title="Se connecter" style="display: flex; align-items: center; gap: 5px;">
    <i class="fas fa-sign-in-alt"></i><span>Se connecter</span>
  </a>
<?php endif; ?>
  </div>
</header>
<div style="text-align: center; margin-top: 120px;">
    <form method="GET" action="recherche.php">
        <input type="text" name="recherche" placeholder="Rechercher un produit..." style="padding: 10px; width: 300px; border-radius: 25px; border: 1px solid #ccc;">
        <button type="submit" style="padding: 10px 20px; border-radius: 25px; background-color: #0d6efd; color: white; border: none; cursor: pointer;">
            Rechercher
        </button>
    </form>
</div>
<!-- Contenu principal -->
  

    <div class="container">
        <h1 class="texta">Bienvenue sur Planéte Sport</h1>
        <p class="textp">vous trouverai tous vos besoin sportifs</p>
    </div>

    <!-- Carousel de promotions -->
    <div id="aa" class="ee" data-bs-ride="carousel">
        <div class="aaa">
            <div class="aaaa">
                <img src="images/themesport.jpg" class="d-block w-100 carousel-img" alt="Promo 1">
                
            </div>
            <!--<div class="carousel-item">
                <img src="../public/images/6807e1a32cdba-samsung-4560984.jpg" class="d-block w-100 carousel-img" alt="Promo 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Remises spéciales</h5>
                    <p>Jusqu'à -50% sur vos articles préférés</p>
                </div>
            </div>-->
        </div>
        <button class="btn" type="button">
            <span class="spn"></span>
        </button>
        <button class="btn2" type="button">
            <span class="spn2"></span>
        </button>
    </div>

    <hr class="hrr">
    <h2 class="hrrr">Découvrez nos meilleures offres</h2>
    

   
<?php
$conn = connectMaBasi();

// Exécution de la requête
if (isset($_GET['recherche']) && !empty(trim($_GET['recherche']))) {
    $recherche = $conn->real_escape_string($_GET['recherche']);
    $sql = "SELECT * FROM produits WHERE nom LIKE '%$recherche%' OR description LIKE '%$recherche%'";
} else {
    $sql = "SELECT * FROM produits";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="produits-container">';
    while ($row = $result->fetch_assoc()) {
        echo '
            <div class="card-produit">
                <img src="images/produits/' . $row["image"] . '" alt="' . $row["nom"] . '">
                <h3>' . $row["nom"] . '</h3>
                <p>' . $row["description"] . '</p>
                <p><strong>' . number_format($row["prix"], 2) . ' €</strong></p>
                <form action="ajouter_panier.php" method="POST">
                    <input type="hidden" name="id_produit" value="' . $row["id"] . '">
                    <input type="submit" class="btn-panier" name="ajoutpanier" value="ajouter au panier"></input>
                </form>
            </div>
        ';
    }
    echo '</div>';
} else {
    echo "<p>Aucun produit trouvé.</p>";
}
?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    

  

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
