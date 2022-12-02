<?php
session_start();
$mysqli = new mysqli ("localhost", "root", "root", "moduleconnexion");
$request = $mysqli -> query("SELECT * FROM utilisateurs");
$result_fetch_all = $request -> fetch_all();

?>

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

