<?php
session_start();
?>
<html>
<head>
  <title></title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f5f7fa;
      font-family: Arial, sans-serif;
    }

    .authen {
      background : #f5f7fa;
      width: 300px;
      color:rgb(0, 0, 0);
      border-radius: 10px;
      border: 0px solid rgb(79, 55, 255);
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
      padding: 15px 20px 5px 20px;
    }

    .authen .inp {
      width: 100%;
      height: 40px;
      background : transparent;
      margin: 15px 0;
    }

    input:hover {
      background-color: rgb(69, 49, 226);
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

    .sign {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin: 10px;
    }

    p {
      margin: 0;
      font-size: 16px;
      color: rgb(79, 55, 255);
    }
    

    .btn2 {
      background-color:rgb(79, 55, 255);
      border: 1px solid rgb(79, 55, 255);
      border-radius: 10px;
      padding: 6px 12px;
      color: white;
      font-size: 14px;
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
    </style>
</head>
<body>
  
  <div class="authen">
    <form action="" method="post">
        <div class="inp">
          <input type="text" name="email" placeholder="email" size="40" maxlength="256" />
        </div>
        <div class="inp"> 
          <input type="password" name="password" placeholder="password" size="40" maxlength="256" />
        </div>
        <div class="btn">
          <input class="btn1" type="submit" name="login" value="login"/>
        </div>
        <div class="sign">
          <p>don't have an account ?</p> <input class="btn2" type="submit" name="sign" value="sign up"/>
        </div>
        <?php
    include 'connexion.php';
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!empty($email) && !empty($password)) { 
        $lien = connectMaBasi();
        $sql = "SELECT * FROM utilisateurs WHERE email='$email' AND mot_de_passe='$password'";
        $result = mysqli_query($lien,$sql) or die ("Erreur SQL !: " . mysqli_error($lien));
        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id_utilisateur'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];

        if ($row['role'] == 'admin') {
                header("Location: admin.php");
                exit;
            } else if ($row['role'] == 'client') {
                header("Location: accueil.php");
                exit;
            }
        } else {
            echo '<div class="erreur"><p>Email ou mot de passe incorrect</p></div>';
        }
        mysqli_close($lien);
      }else {
       echo '<div class="erreur"><p>Veuillez remplir tous les champs</p></div>';
      } 
    }
    if (isset($_POST['sign'])) {
        header("Location: inscription.php");
        exit;
    }
  ?>
    </form>
  </div>
</body>
</html>