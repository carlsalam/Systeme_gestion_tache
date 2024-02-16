<?php 

include 'connexion.php';


$stmt = $pdo->prepare("DELETE FROM new_tache WHERE id = :id");
$stmt->execute(['id' => $id]);


?>