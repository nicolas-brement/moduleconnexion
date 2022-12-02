<?php
    session_start();
    include('bd/connexion.php'); // Fichier PHP contenant la connexion AU BDD

    // S'il y a une session alors on ne retourne plus sur cette page
    if (isset($_SESSION['id'])){
        header('Location: index.php');
        exit;
    }

    // Si la variable "*_POST" contient des informations alors on les traite
    if(!empty($_POST)){
        extract($_POST);
        $valid = true;
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "moduleconnexion";

$connexion = mysqli_connect($servername, $username, $password, $dbname);

    // On se place sur le bon formulaire grâce au "name" de la balise "input"
    if(isset($_POST['inscription'])){
        $pseudo = htmlentities(trim($pseudo)); // On récupère le pseudo
        $nom = htmlentities(trim($nom)); // On récupère le nom
        $prenom = htmlentitites(trim($prenom)); // On récupère le prénom
        $mail = htmlentities(strtolower(trim($mail)));
        $mdp = trim($mdp); // On récupère le mot de passe
        $confmdp = trim($confmdp); // On récupère la confirmation du  mot de passe

        // Vérification du nom
        if(empty($nom)){
            $valid = false;
            $er_nom = ("Le nom d'utilisateur ne peut pas être vide");
        }

        // Vérification du prénom
        if(empty($prenom)){
            $valid = false;
            $er_prenom = ("Le prenom d'utilisateur ne peut pas être vide");
        }
    }

    // Vérifica tion du mot de passe
    if(elmpty($mdp)) {
        $valid = false;
        $er_mdp = "Le mot de passe ne peut pas être vide";
    
    }elseif($mdp != $confmdp){
        $valid = false;
        $er_mdp = "La confirmation du mot de passe ne correspond pas";
    }

    // Si toutes les conditions sont remplies alors on fait le traitement
    if($valid){

        $mdp = crypt($mdp, "$6$rounds=5000$macnicolaspersonnaliseretagardersecret$");
        $date_creation_compte = date('Y-m-d H:i:s');

        // On insert nos données dans la table utilisateur
        $DB->insert("INSERT INTO utilisateur (nom, prenom, mdp) VALUES (?, ?, ?, ?, ?)",
        array($nom, $prenom, $mail, $mdp));

        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8>
        <meta http-equiv="X-UA-Compatinble" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inscription</title>
</head>
<body>
    <div>Inscription</div>
    <br>
    <form method="post">
    <?php
            // S'il y a une erreur sur le nom alors on affiche
            if (isset($er_nom)){
            ?>
                <div><?= $er_nom ?></div>
            <?php
            }
        ?>
        <label for="Votre nom" class="form-label">Nom:</label>
        <br>
        <input type="text" placeholder="Nom" name="Nom" value="<?php if(isset($nom)){ echo $nom; }?>" required>
        <br>
        <?php
        if (isset($er_nom)){
    ?>
        <div><?= $er_nom ?></div>
    <?php
    }
?>

<?php
            // S'il y a une erreur sur le nom alors on affiche
            if (isset($er_prenom)){
            ?>
                <div><?= $er_prenom ?></div>
            <?php
            }
        ?>
        <label for="Votre prenom" class="form-label">Prenom:</label>
        <br>
        <input type="text" placeholder="Prenom" name="Prenom" value="<?php if(isset($nom)){ echo $prenom; }?>" required>
        <br>
        <?php
        if (isset($er_prenom)){
    ?>
        <div><?= $er_prenom ?></div>
    <?php
    }
?>
    
        <?php
            // S'il y a une erreur sur le nom alors on affiche
            if (isset($er_pseudo)){
            ?>
                <div><?= $er_pseudo ?></div>
            <?php
            }
        ?>
        <label for="Votre pseudo" class="form-label">Pseudo:</label>
        <br>
        <input type="text" placeholder="Pseudo" name="pseudo" value="<?php if(isset($pseudo)){ echo $pseudo; }?>" required>
        <br>
        <?php
        if (isset($er_pseudo)){
    ?>
        <div><?= $er_pseudo ?></div>
    <?php
    }
?>


<label for="Mot de passe" class="form-label">Mot de passe:</label>
<br>
<input type="password" placeholder="Mot de passe" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>" required>
<br>
<label for="Confirmer le mot de passe" class="form-label">Confirmer le mot de passe:</label>
<br>
<input type="password" placeholder="Confirmer le mot de passe" name="confmdp" required>
<br>
<button type="submit" name="inscription">Envoyer</button>
</form>
</body>
</html>

<-------------------------------------------------------------------->

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
    

        if(isset($_POST['envoi']))
        $new_password = htmlspecialchars($_POST['new_password']);
        $password = htmlspecialchars($_SESSION['password']);
        $query2 ="UPDATE `utilisateurs` SET password='$new_password' WHERE password= '$password'";
        $sql2 = $bdd->query($query2);
        $result2 = $sql2->fetch_assoc(); // return in array
            echo $result2;
        if ($new_password == $result2['new_password']) {
            echo "Votre password a bien été mis à jour.";
      }
    }
?>

<----------------------------------------------------------------------------------->

if(isset($_POST['envoi'])){

$new_login = htmlspecialchars($_POST['new_login']);
$login = htmlspecialchars($_SESSION['login']);
$new_password = htmlspecialchars($_POST['new_password']);
$password = htmlspecialchars($_SESSION['password']);


$query ="UPDATE `utilisateurs` SET login='$new_login' WHERE login= '$login'";
$sql = $bdd->query($query);
$result = $sql->fetch_assoc(); // return in array
    var_dump($result) ;

    if ($new_login == $result['new_login']){
        echo "Votre login a bien été mis à jour.";
    }


    
    $query2 ="UPDATE `utilisateurs` SET password='$new_password' WHERE password= '$password'";
    $sql2 = $bdd->query($query2);
    $result2 = $sql2->fetch_assoc(); // return in array
        echo $result2;
    if ($new_password == $result2['new_password']) {
        echo "Votre password a bien été mis à jour.";
  }
}



<----------------------------------------------------------------------------------->

if (isset($_POST['submit'])) {
    if ($nom != $_POST['new_login']) {
        $sql1 ="UPDATE `utilisateurs` SET login='{$_POST['new_login']}' WHERE login='$login'";
        $result1 = $conn->query($sql1);
        echo "Votre login a bien été changé par:" . $_POST['new_login'] . "<br>";

    }if ($nom != $_POST['new_password']) {
        $sql2 ="UPDATE `utilisateurs` SET password='{$_POST['new_password']}' WHERE password='$password'";
        $result2 = $conn->query($sql2);
        echo "Votre nom a bien été changé par:" . $_POST['new_password'] . "<br>";
    }
}