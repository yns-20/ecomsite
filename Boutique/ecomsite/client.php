<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-chantier</title>
    <link rel="stylesheet" href="produit.css">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <style>
    {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Variables */
:root {
    --primary-color: #3a6ea5;
    --secondary-color: #c0504d;
    --accent-color: #ff9800;
    --light-bg: #f5f5f5;
    --dark-bg: #333;
    --text-color: #333;
    --light-text: #fff;
}

body {
    background-color: #f5f7fa;
    color: #333;
    line-height: 1.6;
}

/* Header */
header {
    background-color: #3a6ea5;
    color: #fff;
    padding: 1rem 0;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.logo {
    font-size: 2rem;
    font-weight: bold;
}

.logo span {
    color: #0c5e44;
}

/* Navigation */
nav ul {
    display: flex;
    list-style: none;
}

nav ul li {
    margin-left: 1.5rem;
}

nav ul li a {
    color: #0c5e44;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s;
}

nav ul li a:hover {
    color: var(--accent-color);
}

.a1{
	padding-left:6px;
	border-color:#0c5e44;
	color:#0c5e44;
}

/* Navbar */
/* Navbar avec image de fond */
header {
    background: url('acceuil.png') center/cover no-repeat;
    background-attachment: fixed;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 1rem 0;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 10;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
    color: white;
}

nav ul {
    display: flex;
    gap: 20px;
}

nav a {
    color:#0c5e44;
    text-decoration: none;
    font-weight: bold;
}

/*  Quand on fait défiler, la navbar devient blanche */
header.scrolled {
    background: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Ombre douce pour effet 3D */
}

/*header.scrolled .logo,
header.scrolled nav a {
    color: #333; /* Changement de couleur des liens en noir/gris */
}*/

nav a:hover {
    color: #e68a00;
}

/* Section Hero */
.hero {
    position: relative;
    background: url('acceuil.png') center/cover no-repeat;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
   align-items: center;
    text-align: center;
    color: #0c5e44 ;/rgb(255, 255, 255);/
    padding: 2rem;
    margin-top: 60px; /* Décalage pour laisser de l'espace pour la navbar */
    background-position: center center;
    background-size: cover;
}
.contenu{
	position:absolute;
	top:5%;
    bottom:5%;
	left:25%;
    right:25%
}
.hero h1 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
	
}

.hero p {
    font-size: 1.2rem;
	font-weight:600;
    max-width: 800px;
    margin-bottom: 2rem;
}

.hero .btn {
    display: inline-block;
    background-color: #0c5e44;
    color: white;
    padding: 0.8rem 1.5rem;
    border-radius: 4px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s;
}

.hero .btn:hover {
    background-color: #e68a00;
}


    </style>
</head>
    <body>
    <!-- Header -->
    <header>
        
        <div class="header-container">
            <div class="logo"><span>shoooooooop</span></div>
             <nav>
                <ul>
                  
                    <li><input type="text" class="a1" name ="rech" id = "rechInput" placeholder = "Search...."><span> </span><a href="#papeterie"><ion-icon name="search-outline"></ion-icon></a></li>
                    <li><a href="#apropos"><ion-icon name="cart-outline"></ion-icon></a></li>
                    <li><a href="login1.html"><ion-icon name="person-outline"></ion-icon></a></li>
                </ul>
            </nav>
        </div>
    </header>

     <section id="accueil" class="hero">
        <div class="contenu">
        <h1>Bienvenue chez E-shop</h1>
        <p>votre shop digital</p>
        <a href="#categories" class="btn">Découvrir nos produits</a>
    </div>
    </section>

    <!-- Main Content -->
    <main class="container">
	     <!-- Categories Section -->
        <section id="categories">
            <h2 class="section-title">Nos Catégories</h2>
            <div class="categories">
			
                <div class="category">
                    <img src="C:\xampp\htdocs\ecomsite\produits\phones\iphone16promax.jpg" alt="Livres" class="category-img">
                    <div class="category-content">
                        <h3>Livres</h3>
                        <p>Découvrez notre vaste collection de romans, livres éducatifs, biographies et bien plus encore.</p>
                        <a href="#livres" class="btn">Explorer</a>
                    </div>
                </div>
                <div class="category">
                    <img src="papier1.png" alt="Papeterie" class="category-img">
                    <div class="category-content">
                        <h3>Papeterie</h3>
                        <p>Trouvez tous les articles de papeterie dont vous avez besoin pour l'école, le bureau ou la maison.</p>
                        <a href="#papeterie" class="btn">Explorer</a>
                        
                    </div>
                </div>
            </div>
        </section> 
    </body>
</html>