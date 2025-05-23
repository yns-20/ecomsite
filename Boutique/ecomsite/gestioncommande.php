<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: authentification.php");
    exit;
}
?>
<html>
<head>
  <title>Gestion Commandes</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f7fa;
      padding: 40px;
    }
    .dback {
      position: fixed;
      top: 50px;
      left: 50px;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
      width: 40px;
      height: 40px;
      border-radius: 10px;
    }

    .dback input {
      background-color: #f0f2f5;
      color: #212529;
      width: 100%;
      height: 100%;
      border: none;
      font-size: 22px;
      font-weight: bold;
      cursor: pointer;
      border-radius: 10px;
      transition: 0.3s ease;
    }

    .gestion {
      max-width: 500px;
      margin: auto;
      background-color: #f0f2f5;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .allid {
      display: flex;
      align-items: flex-end;
      margin-bottom: 20px;
    }

    .labelid {
      width: 100px;
      font-weight: bold;
      color: #333;
      padding-bottom: 4px;
    }

    .id input {
      width: 100%;
      border: 2px solid black;
      border-radius: 4px;
      font-size: 16px;
      padding: 4px 0;
      background-color: transparent;
      outline: none;
      transition: 0.3s ease;
    }

    .btns {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .btns input[type="submit"] {
      flex: 1;
      padding: 10px;
      font-size: 14px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn1 { background-color: #dc3545; color: white; }
    .btn2 { background-color: #28a745; color: white; }

    .btn1:hover { background-color: #c82333; }
    .btn2:hover { background-color: #218838; }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th {
      background-color: rgb(99, 170, 117);
      color: white;
      padding: 10px;
      text-align: left;
    }

    td {
      padding: 10px;
    }

    th:nth-child(even) { background-color: rgb(71, 121, 84); }
    td:nth-child(even) { background-color: rgb(255, 255, 255); }
    td:nth-child(odd)  { background-color: rgb(232, 232, 232); }
  </style>
</head>
<body>
  <div class="gestion">
    <form action="" method="post">
      <div class="dback">
        <input class="back" type="submit" name="back" value="<">
      </div>
      <div class="allid">
        <div class="labelid"><label>ID commande :</label></div>
        <div class="id">
          <input type="text" name="id" size="40" maxlength="256" />
        </div>
      </div>
      <div class="btns">
        <div><input class="btn1" type="submit" name="supprimer" value="Supprimer"/></div>
        <div><input class="btn2" type="submit" name="afficher" value="Afficher commandes"/></div>
      </div>
    </form>
  </div>

<?php
ob_start();
include 'connexion.php';

if (isset($_POST['back'])) {
    header("Location: admin.php");
    exit;
}

if (isset($_POST['supprimer'])) {
    if (!empty($_POST['id']) && is_numeric($_POST['id'])) {
        $id = intval($_POST['id']);
        $lien = connectMaBasi();
        $sql = "DELETE FROM commandes WHERE id=$id;";
        mysqli_query($lien, $sql) or die("Erreur SQL : $sql<br>" . mysqli_error($lien));
        mysqli_close($lien);
        echo "<p>Commande ID $id supprimée avec succès.</p>";
    } else {
        echo "<p style='color:red;'>ID invalide.</p>";
    }
}

if (isset($_POST['afficher'])) {
    $lien = connectMaBasi();
    $sql = "SELECT * FROM commandes;";
    $result = mysqli_query($lien, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<h3>Liste des commandes :</h3>";
        echo "<table border='1'>
                <tr>
                  <th>ID</th>
                  <th>ID Client</th>
                  <th>statut</th>
                  <th>date</th>
                  <th>methode de paiement</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['id_utilisateur']}</td>
                    <td>{$row['statut']}</td>
                    <td>{$row['date_commande']}</td>
                    <td>{$row['methode_paiement']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Aucune commande trouvée.</p>";
    }
    mysqli_close($lien);
}

ob_end_flush();
?>
</body>
</html>