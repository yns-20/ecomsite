<html>
<head>
    <title>Document</title>
    <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f5f7fa;
      font-family: Arial, sans-serif;
      margin: 0;
    }

    .insc {
        background: transparent;
        width: 300px;
        color: rgb(55, 244, 17);
        border-radius: 10px;
        border: 0px solid rgb(79, 55, 255);
        padding: 15px 20px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .insc .inp {
        width: 100%;
        height: 40px;
        background: transparent;
        margin: 15px 0;
    }

    .inp input {
        width: 100%;
        height: 100%;
        background: transparent;
        border: none;
        outline: none;
        border-bottom: 2px solid rgb(79, 55, 255);
        border-radius: 0px;
        padding: 10px;
        font-size: 16px;
        color: rgb(79, 55, 255);
    }

    .inp input::placeholder {
      color: rgb(79, 55, 255);
      font-size: 18px;
    }

    .btn1 {
      width: 100%;
      height: 40px;
      background: rgb(79, 55, 255);
      border: none;
      outline: none;
      border-bottom: 0px solid rgb(133, 255, 62);
      border-radius: 10px;
      margin: 15px 0;
      color: white;
      font-size: 18px;
      cursor: pointer;
    }
    .erreur {
      background-color: transparent;
      color: black;
      font-size: 14px;
      padding: 10px;
      border-radius: 5px;
      text-align: center;
      margin-top: 20px;
    }
    .erreur p {
      margin: 0;
      font-size: 16px;
      color: rgb(255, 41, 41);
    }
    .btn input:hover {
      background-color: rgb(69, 49, 226);
      transition: 0.3s ease;
    }
    
    </style>
</head>
<body>
    <div class="insc">
        <form action="" method="post">
            <div class="inp">
                <input type="text" name="nom" placeholder="nom" size="40" maxlength="256" />
            </div>
            <div class="inp">
                <input type="text" name="prenom" placeholder="prenom" size="40" maxlength="256" />
            </div>
            <div class="inp"> 
                <input type="text" name="email" placeholder="email" size="40" maxlength="256" />
            </div>
            <div class="inp"> 
                <input type="password" name="password" placeholder="password" size="40" maxlength="256" />
            </div>
            <div class="btn">
                <input class="btn1" type="submit" name="sign" value="sign up"/>
            </div>
             <?php
            include 'connexion.php';
            if (isset($_POST['sign'])) {
            if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['password'])) {
                echo "<div class='erreur'><p>Veuillez remplir tous les champs.</p></div>";
            } else { 
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = 'client';
            $date = date('Y-m-d');
            $lien = connectMaBasi();
            $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, role, date_inscription) VALUES ('$nom','$prenom','$email','$password','$role', NOW())";
            mysqli_query($lien, $sql) or die ("Erreur SQL !: " . mysqli_error($lien));
            mysqli_close($lien);
            header("Location: authentification.php");
            exit;
            
            }
            }
            ?>
        </form>
    </div>
</body>
</html>