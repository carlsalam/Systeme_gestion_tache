<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $tache = $_POST["tache"];    
    $categorie = $_POST["categorie"];
    $description = $_POST["description"];
    $utilisateur = $_POST["utilisateur"];
    try {
        require_once "connexion.php";
        
        $query = "INSERT INTO new_tache(tache, categorie, description, utilisateur) VALUES (:tache, :categorie, :description, :utilisateur);";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":tache", $tache);
        $stmt->bindParam(":categorie", $categorie);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":utilisateur", $utilisateur);
        $stmt->execute();
        
        header("Location: ../index.php");
        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());

    }
}else {
    header("Location: ../index.php");
}

?>