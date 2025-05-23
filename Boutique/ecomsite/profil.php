<?php
session_start();
if (!isset($_SESSION['id'])) {
    // Redirection si l'utilisateur n'est pas connecté
    header("Location: authentification.php");
    exit;
}

include 'connexion.php';

$lien = connectMaBasi();

// Récupération des infos utilisateur depuis la base
$id = $_SESSION['id'];
$sql = "SELECT nom, prenom, email, role, date_inscription FROM utilisateurs WHERE id = $id";
$result = mysqli_query($lien, $sql);
$utilisateur = mysqli_fetch_assoc($result);
mysqli_close($lien);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Profil Utilisateur</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 500px;
      margin: 100px auto;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .info {
      margin: 20px 0;
    }

    .info label {
      font-weight: bold;
      color: #555;
    }

    .info p {
      margin: 5px 0 15px 0;
      color: #222;
    }

    .logout {
      text-align: center;
      margin-top: 30px;
    }

    .logout a {
      text-decoration: none;
      color: white;
      background-color: #d9534f;
      padding: 10px 20px;
      border-radius: 5px;
      transition: 0.3s ease;
    }

    .logout a:hover {
      background-color: #c9302c;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Mon Profil</h1>

  <div class="info">
    <label>Nom :</label>
    <p><?= htmlspecialchars($utilisateur['nom']) ?></p>

    <label>Prénom :</label>
    <p><?= htmlspecialchars($utilisateur['prenom']) ?></p>

    <label>Email :</label>
    <p><?= htmlspecialchars($utilisateur['email']) ?></p>

    <label>Rôle :</label>
    <p><?= htmlspecialchars($utilisateur['role']) ?></p>

    <label>Date d'inscription :</label>
    <p><?= htmlspecialchars($utilisateur['date_inscription']) ?></p>
  </div>

  <div class="logout">
    <a href="logout.php">Se déconnecter</a>
  </div>
</div>

</body>
</html>