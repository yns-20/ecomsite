<?php
ob_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #f0f2f5;
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
.dback input:hover {
  background-color:rgb(233, 233, 233);
}

.gestion {
  max-width: 600px;
  margin: auto;
  background-color: #f0f2f5;
  padding: 30px 40px;
  border-radius: 12px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}

form {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.champs {
  display: grid;
  grid-template-columns: 120px 1fr;
  row-gap: 18px;
  column-gap: 20px;
}

.champs label {
  font-weight: bold;
  color: #333;
  align-self: end;
  padding-bottom: 4px;
}

.champs input[type="text"] {
  width: 100%;
  font-size: 16px;
  padding: 5px 0;
  border: none;
  border: 2px solid rgb(0, 0, 0);
  background-color: transparent;
  border-radius: 4px;
  outline: none;
  transition: border-color 0.3s ease;
}

.champs input[type="text"]:focus {
  border-bottom-color: #0056b3;
}

/* Boutons */
.btns {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 10px;
}

.btns input[type="submit"] {
  flex: 1 1 calc(50% - 10px);
  padding: 10px;
  font-size: 14px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  color: white;
  transition: background-color 0.3s ease;
}

.btn1 input {
  background-color: #28a745;
}
.btn1 input:hover {
  background-color: #218838;
}

.btn2 input {
  background-color: #dc3545;
}
.btn2 input:hover {
  background-color: #c82333;
}

.btn3 input {
  background-color: #ffc107;
  color: #212529;
}
.btn3 input:hover {
  background-color: #e0a800;
}

.btn4 input {
  background-color: #007bff;
}
.btn4 input:hover {
  background-color: #0056b3;
}

table {
  width: 100%;
  border-collapse: collapse;
  border: 0px solid rgb(49, 49, 49);
  margin-top: 20px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}
th {
  background-color: rgb(119, 119, 119);
  color: white;
  padding: 10px;
  text-align: left;
  border: 0px solid rgb(49, 49, 49);
} 
th:nth-child(even) {
  background-color: rgb(136, 136, 136);
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

.image input{
  width: 100%;
  height: 100%;
  background: transparent;
  border: solid 2px rgb(0, 0, 0);
  outline: none;
  color: black;
  font-size: 18px;
  cursor: pointer;
  transition: 0.3s ease;
}
td img {
  border-radius: 6px;
  object-fit: cover;
}

    </style>
</head>
<body>
  <div class="gestion">
    <form action="" method="post">  
      <div class="dback">
        <input class="back" type="submit" name="back" value="<">
      </div>
      <div class="champs">
        <div class="labelid"><label>id :</label></div><div class="id"><input type="text" name="id" ></div>
        <div class="labelnom"><label>nom :</label></div><div class="nom"><input type="text" name="nom" ></div>
        <div class="labeldesc"><label>description :</label></div><div class="desc"><input type="text" name="description" ></div>
        <div class="labelprix"><label>prix :</label></div><div class="prix"><input type="text" name="prix" ></div>
        <div class="labelcateg"><label>categorie :</label></div><div class="categ"><input type="text" name="categorie"></div>
        <div class="labelimage"><label>image :</label></div><div class = "image"><input type="file" name="image" accept="image/png, image/jpeg"></div>
        <div class="labelstock"><label>stock :</label></div><div class="stock"><input type="text" name="stock"></div>
        <div class="labeldate"><label>date_ajout :</label></div><div class="date"><input type="text" name="date_ajout"></div>
      </div>
      <div class="btns">
        <div class="btn1"><input type="submit" value="Ajouter" name="ajouter"></div>
        <div class="btn2"><input type="submit" value="Supprimer" name="supprimer"></div>
        <div class="btn3"><input type="submit" value="Modifier" name="modifier"></div>
        <div class="btn4"><input type="submit" value="Afficher_produits" name="afficher_produits"></div>
      </div>
    </form>
  </div>
  <?php
        include 'connexion.php';
        if (isset($_POST['back'])) {
          header("Location: admin.php");
          exit;
        }
        if(isset($_POST['ajouter'])) {
            $id = $_POST['id']; 
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $categorie = $_POST['categorie'];
            $image = $_POST['image'];

    // Maintenant, on peut utiliser $filePath
            $stock = $_POST['stock'];
            $date_ajout = $_POST['date_ajout'];
            $lien = connectMaBasi();
            $sql = "INSERT INTO produits (id, nom, description, prix, categorie, image, stock, date_ajout) VALUES ('$id','$nom','$description','$prix','$categorie','$image','$stock','$date_ajout')";
            mysqli_query($lien, $sql) or die ("Erreur SQL !: " . mysqli_error($lien));
            mysqli_close($lien);
        }


        if (isset($_POST['supprimer'])) {
            $id = $_POST['id'];
            $lien = connectMaBasi();
            $sql = "DELETE FROM produits WHERE id='$id'";
            mysqli_query($lien, $sql) or die ("Erreur SQL !: " . mysqli_error($lien));
            mysqli_close($lien);
        }

        if (isset($_POST['modifier'])) {
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $description = $_POST['description'];
            $prix = $_POST['prix'];
            $categorie = $_POST['categorie'];
            $image = $_POST['image'];
            $stock = $_POST['stock'];
            $date_ajout = $_POST['date_ajout'];
            $lien = connectMaBasi();
            $sql = "UPDATE produits SET nom='$nom', description='$description', prix='$prix', categorie='$categorie', image='$image', stock='$stock', date_ajout='$date_ajout' WHERE id='$id'";
            mysqli_query($lien, $sql) or die ("Erreur SQL !: ".mysqli_error($lien));
            mysqli_close($lien);
        }

        if (isset($_POST['afficher_produits'])) {
            $lien = connectMaBasi();
            $sql = "SELECT * FROM produits";
            $result = mysqli_query($lien, $sql);
            if (mysqli_num_rows($result) > 0) {
              echo "<h3>Liste des produits:</h3>";
              echo "<div class='tableau'>";
              echo "<table border='1'>
                      <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>description</th>
                        <th>prix</th>
                        <th>categorie</th>
                        <th>image</th>
                        <th>stock</th>
                        <th>date_ajout</th>
                      </tr>";
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['nom'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td>" . $row['prix'] . "</td>
                        <td>" . $row['categorie'] . "</td>
                        <td><img src='../ecomsite/images/produits/" . $row['image'] . "' alt='image' width='80' height='80'></td>
                        <td>" . $row['stock'] . "</td>
                        <td>" . $row['date_ajout'] . "</td>
                      </tr>";
              }
              echo "</table>";
              echo "</div>";
            } else {
              echo "Aucun produit trouve .";
            }
            mysqli_close($lien);
          }
        ?>
<?php
ob_end_flush();
?>
    </body>
</html>