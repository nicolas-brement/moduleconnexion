<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "moduleconnexion";
$bdd = mysqli_connect($servername, $username, $password, $dbname);



    
    if (!empty($_POST["login"]) && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["mdp"]) && !empty($_POST["confmdp"])){
        
        $login = htmlspecialchars($_POST["login"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $prenom= htmlspecialchars($_POST["prenom"]);
        $mdp = htmlspecialchars($_POST["mdp"]);
        $repeatpassword = htmlspecialchars(($_POST["confmdp"]));
        
         if($mdp == $repeatpassword){

           $sql= "INSERT INTO `utilisateurs` ( `login`, `prenom`, `nom`, `password`) VALUES ('$login', '$prenom','$nom', '$mdp')"; // Préparation de la requete 
           $res = mysqli_query($bdd, $sql);// envoie de la requete 
       
             header('Location: connexion.php');

         }else{
            echo " Les mots de passe ne sont pas identiques!";
        }
   }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8>
        <meta http-equiv="X-UA-Compatinble" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style_inscription.css">
        <title>Inscription</title>
</head>

<header>
<div class="inscription"><h2><strong>Inscription</strong></h2></div>
</header>

<body>
        <form method="POST">

            <label for="Votre nom" class="form-label">Nom:</label>
        
            <input type="text" placeholder="Nom" name="nom" value="" required>
            <br>
            <label for="Votre prenom" class="form-label">Prenom:</label>

            <input type="text" placeholder="Prenom" name="prenom" value="" required>
            <br>
            <label for="Votre pseudo" class="form-label">Pseudo:</label>

            <input type="text" placeholder="Login" name="login" value="" required>
            <br>
            <label for="Mot de passe" class="form-label">Mot de passe:</label>

            <input type="password" placeholder="mdp" name="mdp" value="" required>
            <br>
            <label for="Confirmer le mot de passe" class="form-label">Confirmer le mot de passe:</label>

            <input type="password" placeholder="Confirmer le mot de passe" name="confmdp" required>
            <br>
            <button type="submit" name="Envoyer">Envoyer</button>
            </form>
     </body>

<footer>
            <a href="index.php" class="btn">
                <div class="arrow"></div>
                <h6>Retour à l'accueil</h6></a>
</footer>
</html>