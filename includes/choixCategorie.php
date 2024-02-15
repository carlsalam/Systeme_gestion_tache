<?php
include 'connexion.php';


// $category = $_GET['cat'] ?? 'all'; 

// $query = "SELECT * FROM new_tache";
// if ($category !== 'all') {

//     $query .= " WHERE categorie = :category";
// }

// $stmt = $pdo->prepare($query);

// if ($category !== 'all') {
//     $stmt->bindParam(':category', $category);
// }

// $stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Récupérer la catégorie dans l'URL
$category = $_GET['cat'] ?? 'all';

// Requête SQL de base
$query = "SELECT * FROM new_tache";

// if la variable category est pas egale a all (donc une cat est selectionnée)
if ($category !== 'all') {
    $query .= " WHERE categorie = '$category'";
}

// requete sql
$result = $pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);

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




?>