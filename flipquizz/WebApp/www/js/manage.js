//code html est deja charge
window.addEventListener('DOMContentLoaded', function () {

    var deleteElements = document.querySelectorAll('[data-username]');
    var user = document.querySelector('.users');

    for (var i = 0; i < deleteElements.length; i++) {

        var element = deleteElements[i];

        element.addEventListener('click', function () {
            //dataset on recuper le username dans data-username
            //this pour recouperer l'element courent
            var username = this.dataset.username;

            if (confirm('Delete ' + username + ' ?')) {
                var ajx = new XMLHttpRequest();

                //paramettre = key = valeur
                var params = 'username=' + username;

                //get pour recuperer une requette en lecture (delete mod edit)
                //post 
                ajx.open('POST', 'form_user_delete_save.php', true);

                //la meme comme header en php
                //simule les donne 
                //le type est un resultat encode
                ajx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                ajx.onload = function () {
                    if (this.status === 200) {
                        if (this.responseText == '1') {
                            alert('Suppression effectuée');
                        }
                    } else {
                        alert('Echec de la suppresion');
                    }
                }

                //il faut envoie le params pour le post 
                ajx.send(params);
            }
          user.remove(); 
        });
        
    }

});

// //declancher apres tout les element sont charger comme la chargement des images 
// window.addEventListener('load', function() {

// });