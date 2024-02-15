<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données envoyées par la requête AJAX
    // $taskId = $_POST["id"];
    $tache = strtolower($_POST["tache"]);
    $categorie = $_POST["categorie"];
    $description = $_POST["description"];
    $utilisateurs = $_POST["utilisateurs"];


    try {
        include "connexion.php";


        // rechercher le id en question (de la bdd)
        $querySearch = "SELECT id FROM new_tache WHERE LOWER(tache) = LOWER(:tache)";
        $stmtSearch = $pdo->prepare($querySearch);
        $stmtSearch->bindParam(":tache", $tache);
        $stmtSearch->execute();
        $resultSearch = $stmtSearch->fetch(PDO::FETCH_ASSOC);



        if($resultSearch){
            $taskId = $resultSearch["id"];


                // changer la base de donne de la tache en question
            $queryUpdate = "UPDATE new_tache SET tache = :tache, categorie = :categorie, description = :description, utilisateur = :utilisateur WHERE id = :id";

            $stmtUpdate = $pdo->prepare($queryUpdate);
            $stmtUpdate->bindParam(":tache", $tache);
            $stmtUpdate->bindParam(":categorie", $categorie);
            $stmtUpdate->bindParam(":description", $description);
            $stmtUpdate->bindParam(":utilisateur", $utilisateurs);
            $stmtUpdate->bindParam(":id", $taskId);
            $stmtUpdate->execute();

            // code pour aller chercher tous les elements de la bdd et 
            $queryAll = "SELECT * FROM new_tache";

            // executer la requete SQL
            $stmtSelect = $pdo->query($queryAll);
            $result = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);


            foreach($result as $row){
                echo '<div class="tempGridItem">
                <table>
                            
                <tr>  <td>Tache: ' . $row["tache"] . '</td> </tr>
                <tr>  <td>Catégorie: ' . $row["categorie"] . '</td>  </tr>
                <tr>  <td>Description: ' . $row["description"] . ' </td> </tr>
                <tr>  <td>Utilisateurs: ' . $row["utilisateur"] . '</td>   </tr>
        
                </table>
                        <button class="bmodifier">Modifier</button>
                </div>';
            }

        } else {
            echo "ID de la tâche non trouvé.";
        }


    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

    // si la methode de la requete n'est pas POST, rediriger vers index.php
} else {
    header("Location: ../index.php");

}


?>