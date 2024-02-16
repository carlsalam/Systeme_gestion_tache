<?php

include 'connexion.php';


$stmt = $pdo->query("SELECT * FROM nouvelletache WHERE id = :id");
$stmt->execute(['id' => $id]);

?>