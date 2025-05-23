<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: authentification.php");
    exit;
}
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
      background-color: #f0f2f5;
      font-family: Arial, sans-serif;
    }
    .dback {
      position: fixed;
      top: 50px;
      left: 50px;
      background: #f0f2f5;
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
    .gest {
      display: flex;
      justify-content: space-between;
      background: transparent;
      box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }
    .client, .produit{
      width: 45%;
      background: #f0f2f5;
      height: 250px;
      width: 250px;

    }
    .client {
      border-right: 0px solid rgb(0, 0, 0);
      border-top-left-radius: 10px;
      border-bottom-left-radius: 10px;

    }
    .produit {
      border-left: 0px solid rgb(255, 255, 255);
      border-top-right-radius: 10px;
      border-bottom-right-radius: 10px;
    }
    .btn1 {
      
    }
    .btn2 {
      
    }
    
    input[type="submit"] {
      width: 100%;
      height: 100%;
      background: transparent;
      border: none;
      outline: none;
      color: black;
      font-size: 18px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background: rgb(0, 0, 0);
      color: white;
      font-size: 25px;
      transition: 0.2s;
    }
    .labclient, .labproduit {
      text-align: center;
    }
    .commande {
  width: 250px;
  background: #f0f2f5;
  border-radius: 10px;
  margin-left: 20px;
}
.lignecommande {
  width: 250px;
  background: #f0f2f5;
  border-radius: 10px;
  margin-left: 20px;
}
    </style>
</head>
<body>
  
  <div class ="gestion">
    <form action="" method="post">   
      <div class="dback">
        <input class="back" type="submit" name="back" value="<">
      </div>
      <div class="gest">
  <div class="client">
    <input class="btn1" type="submit" name="client" value="Gestion client"/>
  </div>
  <div class="produit">
    <input class="btn2" type="submit" name="produit" value="Gestion produit"/> 
  </div> 
  <div class="commande">
    <input class="btn3" type="submit" name="commande" value="Gestion commande"/> 
  </div> 
  <div class="lignecommande">
    <input class="btn4" type="submit" name="lignecommande" value="Gestion ligne de commande"/> 
  </div>
</div>
    </form>
  </div> 
  <?php
    include 'connexion.php';
    if (isset($_POST['client'])) {
       header("Location: gestionclient.php");
    } else if (isset($_POST['produit'])) {
       header("Location: gestionproduit.php");
    } else if (isset($_POST['back'])) {
       header("Location: authentification.php");
    }
    if (isset($_POST['commande'])) {
   header("Location: gestioncommande.php");
   exit;
    }
   if (isset($_POST['lignecommande'])) {
   header("Location: gestionlignecommande.php");
   exit;
   }


  ?>
</body>
</html>