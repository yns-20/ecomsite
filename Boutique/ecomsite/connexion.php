<?php
function connectMaBasi(){
$basi = mysqli_connect ('localhost', 'root', '','boutique');
return $basi;
}

/*$host = "localhost";
$user = "root";
$password = ""; // adapte selon ton installation
$dbname = "boutique";

$conn = new mysqli($host, $user, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}*/


?>