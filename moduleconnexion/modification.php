<?php
session_start();
$servername = "localhost";
$username = "root";
$password_serveur = "root";
$dbname = "moduleconnexion";
$bdd = mysqli_connect($servername, $username, $password_serveur, $dbname);

$login = htmlspecialchars($_SESSION['login']);

if(isset($_POST['envoi'])){
    $new_login = htmlspecialchars($_POST['new_login']);
    $login = htmlspecialchars($_SESSION['login']);
    $query ="UPDATE `utilisateurs` SET login='$new_login' WHERE login= '$login'";
    $sql = $bdd->query($query);
    $result = $sql->fetch_assoc(); // return in array
        echo $result;
        if ($new_login == $result['new_login']){
            echo "Votre login a bien été mis à jour.";
        }
    }
?>

        <!DOCTYPE html>
        <html>
        <head>
            <title>Modfification du profil</title>
            <meta charset="utf-8">
        </head>
        <body>
        
            <form method="POST" action="">
        
                <label for="pseudo" name="new_login" class="form-label">Nouveau pseudo:</label>
                <br>
                <input type="text" name="new_login">
                <br>
                <input type="submit" name="envoi">
            </form>
        </body>
        </html>
