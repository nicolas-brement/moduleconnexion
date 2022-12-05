<?php
$servername = "localhost";
$username = "root";
$password_serveur = "root";
$dbname = "moduleconnexion";
$bdd = mysqli_connect('localhost', 'root', 'root', 'moduleconnexion');
// connexion à la base de donnée


      if(isset($_POST['envoi'])){ // If submit -> put login and password in variable
          $login = htmlspecialchars($_POST['login']);
          $password = $_POST['password'];
          $query = "SELECT `password` FROM utilisateurs WHERE login='$login'"; // query select password from utilisateur
          $sql = $bdd->query($query); // Execute query on the database
          $result = $sql->fetch_assoc(); // return in array
          echo $result;
          if ($password == $result['password']) {
              // if return true so connect, else don't
              echo "EZYEZY";
              session_start();
              $_SESSION['login'] = $login;

              if($login == 'admin') {
                  header('Location: admin.php');
              }else{
                  header('Location: profil.php');
              }
          } else {
              echo "Le login ou le mot de passe est incorrect";
          }

      }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatinble" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style_connexion.css">
    <title>Inscription</title>
</head>

<header>
<div class="connexion"><h2><strong>Connexion</strong></h2></div>
        <br>
</header>

<body>

    <form method="POST" action="">

        <label for="pseudo" name="login" class="form-label">Pseudo:</label>
      
        <input type="text" name="login">
        <br>
        <label for="password" name="password" class="form-label">Password:</label>
   
        <input type="password" name="password">
        <br>
        <input type="submit" name="envoi">
    </form>
</body>

<footer>
    <a href="index.php" class="btn">
                <div class="arrow"></div>
                <h6>Retour à l'accueil</h6></a>
</footer>
</html>