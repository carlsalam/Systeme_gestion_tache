<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de tache</title>
    <link rel="stylesheet" href="index.css">
</head>


<body>
    
    <div class="dheader">
        <h2>Ajouter une tâche</h2><br>
    </div>
    
    <div style="margin-top: 30vh;">


        <fieldset class="fsajout">
            <form action="includes/ajoutertache.php" method="POST"><br>

                <label for="tache">Nom de la tache :</label>
                <input id="nom" type="text" name="tache" placeholder="Nom de la tache" required><br>

        
                <label for="categorie">Catégorie :</label>
                <select id="cat" name="categorie" required>
                    <option value="Choisir"></option>
                    <option value="INF111">INF111</option>
                    <option value="TCH055">TCH055</option>
                    <option value="TCH056">TCH056</option>
                    <option value="TCH057">TCH057</option>
                    <option value="TCH099">TCH099</option>

                </select><br>

                <label style="margin-bottom: 30px;" for="description">Description :</label>
                <textarea id="desc" placeholder="Description" name="description" id="description" cols="35" rows="3" required></textarea><br>
        
                <label for="utilisateur">Utilisateurs affectés :</label>
                <input id="user" type="text" name="utilisateur" id="u_affecter" placeholder="Utilisateurs" required> 


        
                <br><br>
                <button class="bajouter" type="submit">Ajouter</button>
                <button class="beffacer" type="reset">Effacer</button>
                <button class="bannuler" type="button"><a href="index.php">Retour</a></button><br>
            </form>
        </fieldset>
        
    </div>

    

</body>
</html>