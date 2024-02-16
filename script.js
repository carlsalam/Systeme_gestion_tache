document.addEventListener('DOMContentLoaded', function() {

        // gestionnaire d'evenm pour le boutton modifier des taches
        let tacheski = document.getElementsByClassName('bmodifier');
        for (let i = 0; i < tacheski.length; i++) {
            tacheski[i].addEventListener('click', openModal);
        }


        // // gestionnaire d'evenm pour le boutton supprimer des taches
        // let supTache = document.getElementsByClassName('bsupp');
        // for (let i = 0; i < supTache.length; i++) {
        //     supTache[i].addEventListener('click', supprimerTache());
        // }

        // gestionnaire d'evenm pour le "x" de la modal
        let closeButton = document.querySelector('.modalclose');
        if (closeButton) {
            closeButton.addEventListener('click', fermerModal);
        }
        
        // gestionnaire d'événements si on clic en dehors de la modal
        window.addEventListener('click', function(event) {
            let modal = document.getElementById('myModal');
            if (event.target == modal) {
                fermerModal();
            }
        });

        // variable globale pour stocker les donner du tableau de la tache en question
        var cells;



    // Fonction pour supprimer une tache
    // function supprimerTache (event) {
    //     let target = event.target;

    //     // Vérifier si le clic a été effectué sur un bouton
    //     if (target.nodeName === "BUTTON") {
    //         // Récupérer le parent du bouton (tempGridItem)
    //         let parent = target.parentNode;

    //         // Récupérer la tâche à supprimer (vous devez ajuster cette ligne selon la structure réelle de vos cellules)
    //         let tacheASupprimer = parent.querySelector('td:nth-child(1)').textContent.split("Tache: ")[1];

    //         // Requête AJAX pour supprimer la tâche de la base de données
    //         $.ajax({
    //             type: "POST",
    //             url: "includes/supprimerTache.php", // Ajoutez le chemin correct vers votre fichier PHP de suppression
    //             data: {
    //                 tache: tacheASupprimer
    //             },
    //             success: function(response) {
    //                 // Mettre à jour la partie de votre page où les tâches sont affichées
    //                 // Vous devez ajuster cela en fonction de la structure de votre page
    //                 document.getElementById('listeTaches').innerHTML = response;
    //             },
    //             error: function() {
    //                 console.log("Erreur lors de la requête AJAX");
    //             }
    //         });
    //     }
    // }


    // Fonction pour ouvrir la modal
    function openModal(event) {

        console.log("je suis dans la fonciton openModal")

        // Récupérer les champs du tableau
        let tacheField = document.getElementById('tache');
        let categorieField = document.getElementById('categorie');
        let descriptionField = document.getElementById('description');
        let utilisateursField = document.getElementById('utilisateurs');

        // Récupérer l'élément du clic
        let target = event.target;

        // Vérifier si le clic a été effectué sur un bouton
        if (target.nodeName === "BUTTON") {
            // Récupérer le parent du bouton (tempGridItem)
            let parent = target.parentNode;
            // Récupérer le tab
            let table = parent.querySelector('table');
            // Récupérer toutes les cellules du tab
            cells = table.querySelectorAll('td');
            console.log(cells);


            // Parcourir cells pour extraire les info et les mettre dans la modal
            cells.forEach(function(cell) {
                if (cell.textContent.includes("Tache")) {
                    tacheField.value = cell.textContent.split("Tache: ")[1];
                }
                else if (cell.textContent.includes("Catégorie")) {
                    categorieField.value = cell.textContent.split("Catégorie: ")[1];
                }
                else if (cell.textContent.includes("Description")) {
                    descriptionField.value = cell.textContent.split("Description: ")[1];
                }
                else if (cell.textContent.includes("Utilisateurs")) {
                    utilisateursField.value = cell.textContent.split("Utilisateurs: ")[1];
                }
            });

            document.getElementById("myModal").style.display = "block";
            
            if(document.getElementById("myModal").style.display != "none"){

                let btnModalModif = document.getElementById('btnModifierModal');
                btnModalModif.addEventListener('click', modifierTache);
            }
        }
    }


    // fonction qui modifie la tache a partir des donnes de la modal
    function modifierTache(event){

        console.log(event);

        console.log("je suis dans la fonction modifierTache");

        // aller chercher les champs de la modal    
        let tacheModal = document.getElementById('tache').value;
        let categorieModal = document.getElementById('categorie').value;
        let descriptionModal = document.getElementById('description').value;
        let utilisateursModal = document.getElementById('utilisateurs').value;

        console.log(cells[0], cells[1], cells[2], cells[3])

        //mettre a jour les cel du tab
        cells[0].textContent = "Tache: "+ tacheModal;
        cells[1].textContent = "Catégorie: "+ categorieModal;
        cells[2].textContent = "Description: "+ descriptionModal;
        cells[3].textContent = "Utilisateurs: "+ utilisateursModal;

        event.preventDefault();

        fermerModal();


        // taskId = document.;

        // requete AJAX pour envoyer la modification a la bdd 
        $.ajax({
            type: "POST",
            url: "includes/modifierTache.php",
            data: {
                tache: tacheModal,
                categorie: categorieModal,
                description: descriptionModal,
                utilisateurs: utilisateursModal
            },
            success: function (response) {
                 //pas sur pour le le div .d2 / #listeTaches
                document.getElementById('listeTaches').innerHTML = response;
            },
            error: function(){
                console.log("Erreur lors de la requête AJAX");
            }
        });

    }

    
    // fonction pour fermer la modal
    function fermerModal() {
        document.getElementById('myModal').style.display = 'none';
    }


        //logique pour le choix des categories
        let a = document.querySelectorAll('.ncategorie a');
        var nomCategorie;

        console.log(a);

        for (let i = 0; i < a.length; i++) {
            a[i].addEventListener('click', function(event){

                event.preventDefault();

                // aller chercher le nom de la categorie dans le url et le passer a la fonciton choixCat
                nomCategorie = this.getAttribute('href').split('=')[1];
                choixCat(nomCategorie);
            });
        }

    // fonction qui trie les taches par rapport à la catégorie
    function choixCat(categorie){

        $.ajax({
            type: "GET",
            url: "includes/choixCategorie.php",
            data: {cat: categorie},

            success: function (response) {
                //pas sur pour le le div .d2 / #listeTaches
                document.getElementById('listeTaches').innerHTML = response;
            },
            error:function(){
                console.log("Erreur lors de la requête AJAX");
            }
        });

    }

    // document.querySelectorAll('.ncategorie a').forEach(function(link) {
    //     link.addEventListener('click', function(event) {
    //       event.preventDefault();
    //       const cat = this.getAttribute('href').split('=')[1];
    //       filtreTache(cat);
    //     });
    //   });
      
    //   function filtreTache(categorie) {
    //     $.ajax({
    //       url: 'includes/choixCategorie.php',
    //       type: 'GET',
    //       data: {cat: categorie},
    //       success: function(response) {
    //         document.querySelector('.d2').innerHTML = response;
    //       },
    //       error: function() {
    //         alert('Erreur lors du filtrage des tâches');
    //       }
    //     });
    //   }



});

