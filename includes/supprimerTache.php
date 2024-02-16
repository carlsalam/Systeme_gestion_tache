<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tacheASupprimer = $_POST["tache"];

    try {
        include "connexion.php";

        // Requête pour supprimer la tâche de la base de données
        $queryDelete = "DELETE FROM new_tache WHERE tache = :tache";
        $stmtDelete = $pdo->prepare($queryDelete);
        $stmtDelete->bindParam(":tache", $tacheASupprimer);
        $stmtDelete->execute();

        // Code pour récupérer et afficher les tâches mises à jour
        $queryAll = "SELECT * FROM new_tache";
        $stmtSelect = $pdo->query($queryAll);
        $result = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $row) {
            echo '<div class="tempGridItem">
                <table>
                    <tr><td>Tache: ' . $row["tache"] . '</td></tr>
                    <tr><td>Catégorie: ' . $row["categorie"] . '</td></tr>
                    <tr><td>Description: ' . $row["description"] . '</td></tr>
                    <tr><td>Utilisateurs: ' . $row["utilisateur"] . '</td></tr>
                </table>
                <button class="bmodifier">Modifier</button>
                <button class="bsupp">Supprimer</button>
            </div>';
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {       // si la methode de la requete n'est pas POST, rediriger vers index.php

    header("Location: ../index.php");
}

?>