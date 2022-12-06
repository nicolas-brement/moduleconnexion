<?php
session_start();
$mysqli = new mysqli ("localhost", "root", "root", "moduleconnexion");
$request = $mysqli -> query("SELECT * FROM utilisateurs");
$result_fetch_all = $request -> fetch_all();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Site</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style_admin.css">
</head>

<header>
    <h2>Informations base de données</h2>
</header>

<table>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>prenom</th>
        <th>nom</th>
        <th>password</th>
    <tr>

<?php

foreach($result_fetch_all as $ligne){
    echo "<tr>";
    foreach($ligne as $champ){
        echo "<td>" . $champ ."</td>";
    }
    echo "</tr>";
}
?>
</table>

<footer>
    <a href="index.php" class="btn">
                <div class="arrow"></div>
                <h6>Retour à l'accueil</h6></a>
</footer>

</html>

