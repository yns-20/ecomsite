<html>
<head>
  <title></title>
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
  background-color:#f0f2f5;
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
.dback input:hover {
  background-color:rgb(249, 249, 249);
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

/* Groupes ID et rôle */
.allid, .allrole {
  display: flex;
  align-items: flex-end; /* aligne les labels avec le bas des inputs */
  margin-bottom: 20px;
}

.labelid, .labelrole {
 width: 100px;
  font-weight: bold;
  color: #333;
  padding-bottom: 4px; /* ajustement visuel si besoin */
}

.id input,
.role input {
   width: 100%;
  border: none;
  border: 2px solid rgb(0, 0, 0);
  border-radius: 4px;
  font-size: 16px;
  padding: 4px 0;
  background-color: transparent;
  outline: none;
  transition: 0.3s ease;
}

.id input:focus,
.role input:focus {
  border-color: rgb(120, 120, 120);
}

/* Boutons */
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

.btn1 {
  background-color: #dc3545;
  color: white;
}

.btn2 {
  background-color: #ffc107;
  color: white;
}

.btn3 {
  background-color: #28a745;
  color: white;
}

.btn1:hover {
  background-color: #c82333;
}

.btn2:hover {
  background-color: #e0a800;
}

.btn3:hover {
  background-color: #218838;
}
table {
  width: 100%;
  border-collapse: collapse;
  border: 0px solid rgb(49, 49, 49);
  margin-top: 20px;
}
th {
  background-color: rgb(99, 170, 117);
  color: white;
  padding: 10px;
  text-align: left;
  border: 0px solid rgb(49, 49, 49);
} 
td {
  padding: 10px;
  border: 0px solid rgb(49, 49, 49);
}
th:nth-child(even) {
  background-color: rgb(71, 121, 84);
}
td {
  padding: 10px;
  border: 0px solid rgb(49, 49, 49);
}
td:nth-child(even) {
  background-color: rgb(255, 255, 255);
}
td:nth-child(odd) {
  background-color:rgb(232, 232, 232);
}
    </style>
</head>
<body>
  <div class="gestion">
    <form action="" method="post">
      <div class="dback">
        <input class="back" type="submit" name="back" value="<">
      </div>
      <div class="allid">
      <div class="labelid"><label>ID : </label></div>
      <div class="id">
      <input type="text" name="id" size="40" maxlength="256" />
      </div>
      </div>
      <div class="allrole">
      <div class="labelrole"><label>role : </label></div>
      <div class="role"><input type="text" name="role" size="40" maxlength="256" />
      </div>
      </div>
      <div class="btns">
      <div class="supprimer"><input class="btn1" type="submit" name="supprimer" value="Supprimer"/></div>
      <div class="modifier"><input class="btn2" type="submit" name="modifier" value="Modifier"/></div>
      <div class="afficher"><input class="btn3" type="submit" name="afficher_clients" value="Afficher les clients"/></div>
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
  // Modifier un client
  if (isset($_POST['modifier'])) {
     if (!empty($_POST['id']) && is_numeric($_POST['id']) && !empty($_POST['role'])) {
        $id = intval($_POST['id']);
        $role = htmlspecialchars(trim($_POST['role'])); // Nettoyage simple
        $lien = connectMaBasi();
    $id = $_POST['id'];
    $role = $_POST['role'];
    $lien = connectMaBasi();
    $sql = "UPDATE utilisateurs SET role='$role' WHERE id=$id;";
    mysqli_query($lien, $sql) or die ("Erreur SQL !" . $sql . "<br />" . mysqli_error($lien));
    mysqli_close($lien);
     }else {
        echo "ID ou rôle invalide.";
    }
  }

  // Supprimer un client
  if (isset($_POST['supprimer'])) {
    if (!empty($_POST['id']) && is_numeric($_POST['id'])) {
        $id = intval($_POST['id']);
        $lien = connectMaBasi();
    $id = $_POST['id'];
    $lien = connectMaBasi();
    $sql = "DELETE FROM utilisateurs WHERE id=$id;";
    mysqli_query($lien, $sql) or die ('Erreur SQL !' . $sql . '<br />' . mysqli_error($lien));
    mysqli_close($lien);
    }else {
        echo "ID invalide.";
    }
  }

  // Afficher tous les clients inscrits
  if (isset($_POST['afficher_clients'])) {
    $lien = connectMaBasi();
    $sql = "SELECT * FROM utilisateurs;";
    $result = mysqli_query($lien, $sql);
    if (mysqli_num_rows($result) > 0) {
      echo "<h3>Liste des clients inscrits:</h3>";
      echo "<div class='tableau'>";
      echo "<table border='1'>
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>password</th>
                <th>role</th>
                <th>date d'inscription</th>
              </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nom'] . "</td>
                <td>" . $row['prenom'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['mot_de_passe'] . "</td>
                <td>" . $row['role'] . "</td>
                <td>" . $row['date_inscription'] . "</td>
              </tr>";
      }
      echo "</table>";
      echo "</div>";
    } else {
      echo "Aucun client inscrit.";
    }
    mysqli_close($lien);
  }
  ob_end_flush();
  ?>
</body>
</html>