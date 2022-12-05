<?php
session_start();
$servername = "localhost";
$username = "root";
$password_serveur = "root";
$dbname = "moduleconnexion";
$bdd = mysqli_connect('localhost', 'root', 'root', 'moduleconnexion');
// connexion à la base de donnée

$login = $_SESSION['login']; 

if(!empty($_SESSION)) { 
    $query = "SELECT * FROM utilisateurs WHERE login='$login'";
    $sql = $bdd->query($query);
    $result = $sql->fetch_assoc(); 
    $login_bdd = $result['login']; 
    $nom = $result['nom'];
    $prenom = $result['prenom'];
    $password = $result['password'];

    if (isset($_POST['submit'])) { 
        if ($nom != $_POST['nom']) { 
            $sql1 = "UPDATE `utilisateurs` SET nom='{$_POST['nom']}' WHERE nom='$nom'";
            $result1 = $bdd->query($sql1);
            echo "Votre nom a bien été changé par:" . $_POST['nom'] ."<br>";

        }if ($prenom != $_POST['prenom']) {
            $sql2 = "UPDATE `utilisateurs` SET prenom='{$_POST['prenom']}' WHERE prenom='$prenom'";
            $result2 = $bdd->query($sql2);
            echo "Votre nom a bien été changé par:" . $_POST['prenom'] . "<br>";
        }if ($login != $_POST['login']) {
            $sql3 = "UPDATE `utilisateurs` SET login='{$_POST['login']}' WHERE login='$login'";
            $result3 = $bdd->query($sql3);
            echo "Votre login a bien été changé par:" . $_POST['login'] . "<br>";
        }if ($password != $_POST['password']) {
            $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql4 = "UPDATE `utilisateurs` SET password='$new_password' WHERE password='$password'";
            $result4 = $bdd->query($sql4);
            echo "Votre mot de passe a bien été changé par:" . $_POST['password'] . "<br>";
        }

    }

}
if (isset($_POST['delete'])) {
    $sql_delete = "DELETE FROM utilisateurs WHERE login='$login'";
    $result_delete = $bdd->query($sql_delete);
    echo "Vos données ont été supprimées";
    session_destroy();
    header('Location: index.php');
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style_profil.css">
    <title>Page de profil</title>
</head>

<header>
<div class="profil"><h2><strong>Votre profil</strong></h2></div>
        <br>
</header>

<body>
<section class="formulaire">
    <h1 id="texte_profil"><?php echo 'Bonsoir ' . $_SESSION['login'];?> </h1>

    <br>
    <br>
    <section id="tableau">
        <table>
            <form method="post">
                <thead>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Login</td>
                <td>Mot de passe</td>
                </thead>
                <tbody>
                <tr>
                    <td><input id="input_profil" name="nom" placeholder="<?php echo $result['nom'] ?>" required></td>
                    <td><input id="input_profil" name="prenom" placeholder="<?php echo $result['prenom'] ?>" required></td>
                    <td><input id="input_profil" name="login" placeholder="<?php echo $result['login'] ?>"required></td>
                    <td><input id="input_profil" name="password" placeholder="<?php echo $result['password'] ?>"></td>
                </tr>
                </tbody>
            <tfoot>
                <button class="delete" type="submit" name="delete">Supprimer mon compte</button>
                <br>
                <button class="modifier" type="submit" name="submit">Modifier</button>
            </tfoot>
            </form>
        </table>
    </section>


</section>

<footer>
<a href="index.php" class="btn">
                <div class="arrow"></div>
                <h6>Retour à l'accueil</h6></a>
</footer>
    