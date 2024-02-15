<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Cours</title>
    <link rel="stylesheet" href="index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="script.js"></script>

</head>


<body>
    
    
    <section class="page">
        <header class="pheader">

            <div>
                <!-- image de google images -->
                <img class="Logo" src=https://www.etsmtl.ca/getmedia/2f8780e4-2f36-4bdd-b28a-6de0e475071b/Logo_ETS_TypoGrise_D_EN alt="Logo">

                <h1>Gestion des cours <br>à l'ETS</h1>
                                            <!-- icone de boxicons.com -->
                <button class="bconnexion"><i class='bx bx-user'></i><a style="margin-left: 5px;" href="allo">connexion</a></button>

            </div>

        </header>
        

        <nav class="ncategorie">

            <p><strong>Sigle de cours</strong></p>
            
            <ul>
                <li><a href="index.php?cat=INF111" target="_self">INF111</a></li>
                <li><a href="index.php?cat=TCH055" target="_self">TCH055</a></li>
                <li><a href="index.php?cat=TCH056" target="_self">TCH056</a></li>
                <li><a href="index.php?cat=TCH057" target="_self">TCH057</a></li>
                <li><a href="index.php?cat=TCH099" target="_self">TCH099</a></li>
            </ul>
        </nav>

        <main>

                <div class="d1">
                  <h2>Liste des taches</h2>


                    <div>
                        <!-- <h4 style="text-align: center;">Gerer les taches</h4> -->
                        <button class="bgerer1"><i class='bx bx-plus'></i><a style="color: white; margin-left: 3px;" href="ajout.php">Ajouter une tache</a></button>
                        <button class="bgerer2">Supprimer</button>
                    </div>

                  
                </div>
              
                <!-- la boite qui contient les taches -->
                <div class="d2" id="listeTaches">


                <?php 
                
                include 'includes/connexion.php';

                $stmt = $pdo->query("SELECT * FROM new_tache");
                
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo '<div class="tempGridItem" >
                    <table>
                                
                      <tr>  <td>Tache: ' . $row["tache"] . '</td> </tr>
                      <tr>  <td>Catégorie: ' . $row["categorie"] . '</td>  </tr>
                      <tr>  <td>Description: ' . $row["description"] . ' </td> </tr>
                      <tr>  <td>Utilisateurs: ' . $row["utilisateur"] . '</td>   </tr>

                    </table>
                            <button class="bmodifier">Modifier</button>
                    </div>';
                }?>

                  <!-- <div class="tempGridItem">
                    <table>
                
                      <caption><strong>Tache 1</strong></caption>
                
                      <tr>  <td>Tache: Laboratoire 1</td> </tr>
                      <tr>  <td>Catégorie: INF111</td>  </tr>
                      <tr>  <td>Description: Finir les commentaires dans le labo 1. </td> </tr>
                      <tr>  <td>Utilisateurs: Carl Salamouny</td>   </tr>

                    </table>
                            <button class="bmodifier">Modifier</button>
                  </div>

                  <div class="tempGridItem">
                    <table>
                
                      <caption><strong>Tache 2</strong></caption>
                
                      <tr>  <td>Tache: Remise 1</td> </tr>
                      <tr>  <td>Catégorie: TCH056</td>  </tr>
                      <tr>  <td>Description: Finir le style de la page css. </td> </tr>
                      <tr>  <td>Utilisateurs: Carl Salamouny</td>   </tr>

                  </table>
                    <button class="bmodifier">Modifier</button>
                  </div>

                  <div class="tempGridItem">
                    <table>
                
                      <caption><strong>Tache 3</strong></caption>
                
                      <tr>  <td>Tache: labo d'application mobile</td> </tr>
                      <tr>  <td>Catégorie: TCH057</td>  </tr>
                      <tr>  <td>Description: Commencer le laboratoire 1 en application. </td> </tr>
                      <tr>  <td>Utilisateurs: Carl Salamouny</td>   </tr>

                    </table>                            
                    <button class="bmodifier">Modifier</button>
                  </div>

                  <div class="tempGridItem">
                    <table>
                
                      <caption><strong>Tache 4</strong></caption>
                
                      <tr>  <td>Tache: Revoir la theorie</td> </tr>
                      <tr>  <td>Catégorie: TCH055</td>  </tr>
                      <tr>  <td>Description: Reprendre le cours 1 et 2 de base de donnee. </td> </tr>
                      <tr>  <td>Utilisateurs: Carl Salamouny</td>   </tr>
                      

                    </table>

                    <button class="bmodifier">Modifier</button>

                  </div>



                  <div class="tempGridItem">
                    <table>
                
                      <caption><strong>Tache 4</strong></caption>
                
                      <tr>  <td>Tache: Revoir la theorie</td> </tr>
                      <tr>  <td>Catégorie: TCH055</td>  </tr>
                      <tr>  <td>Description: Reprendre le cours 1 et 2 de base de donnee. </td> </tr>
                      <tr>  <td>Utilisateurs: Carl Salamouny</td>   </tr>
                      

                    </table>

                    <button class="bmodifier">Modifier</button>

                  </div> -->

                  

                </div>

        </main>
      
            <!-- Modale d'Image -->
      <div id="myModal" class="modal">
      <span class="modalclose" title="Fermer">&#10006;</span>

        <form class="tempGridItem2">
          <fieldset>
              <legend><strong>Modifier la tache</strong></legend>
      
              <label for="tache">Tache:</label>
              <input type="text" id="tache" name="tache" value="Laboratoire 1">
      
              <label for="categorie">Catégorie:</label>
              <input type="text" id="categorie" name="categorie" value="INF111">
      
              <label for="description">Description:</label>
              <textarea id="description" name="description">Finir les commentaires dans le labo 1.</textarea>
      
              <label for="utilisateurs">Utilisateurs:</label>
              <input type="text" id="utilisateurs" name="utilisateurs" value="Carl Salamouny">
          </fieldset>
      
          <button type="button" id="btnModifierModal">Modifier</button>
        </form>


      </div>

    </section>


</body>
</html>