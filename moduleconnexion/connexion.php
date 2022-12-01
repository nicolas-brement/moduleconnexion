<?php
$servername = "localhost";
$username = "root";
$password = "root";
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
                  header('Location: index.php');
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
</head>
<body>

    <form method="POST" action="">

        <label for="pseudo" name="login" class="form-label">Pseudo:</label>
        <br>
        <input type="text" name="login">
        <br>
        <label for="password" class="form-label">Password:</label>
        <br>
        <input type="password" name="password">
        <br><br>
        <input type="submit" name="envoi">
    </form>
</body>
</html>