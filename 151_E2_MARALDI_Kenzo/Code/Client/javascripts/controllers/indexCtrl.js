/*
 * Contrôleur de la vue "index.html"
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 13-SEP-2013
 */

/**
 * Méthode appelée lors du retour avec succès de la liste des pays
 * @param {type} data
 * @param {type} text
 * @param {type} jqXHR
 * @returns {undefined}
 */
function chargerSuperheroSuccess(data, text, jqXHR) {
  var cmbSuperhero = document.getElementById("cmbSuperhero");
  $(data).find("superhero").each(function () {
    var superhero = new Superhero();
    superhero.setNom($(this).find("nom").text());
    superhero.setPk($(this).find("pkSuperhero").text());
    superhero.setDescription($(this).find("description").text());
    superhero.setFKGenre($(this).find("FK_Genre").text());
    superhero.setFKPlanete($(this).find("FK_Planete").text());
    cmbSuperhero.options[cmbSuperhero.options.length] = new Option(superhero, JSON.stringify(superhero));
  });
}

/**
 * Méthode appelée en cas d'erreur lors de la lecture des pays
 * @param {type} request
 * @param {type} status
 * @param {type} error
 * @returns {undefined}
 */
function chargerSuperheroError(request, status, error) {
  
}
function chargerUtilisateursSuccess(data) {
  console.log("La liste d'utilisateur a bien été envoyé");
  var nameTab = [];
  $(data)
    .find("utilisateur")
    .each(function () {
      var utilisateur = new Utilisateur();
      utilisateur.setNom($(this).find("nom").text());
      utilisateur.setPkUtilisateur($(this).find("pk_utilisateur").text());
      nameTab.push(utilisateur.getNom());
    });
  document.getElementById("users").innerHTML = nameTab;
}
//fonction permettant de vérifier et faire la suppression d'un utilisateur
function preDelUtilisateursSuccess(data) {
  console.log("recherche du userDel");
  $(data)
    .find("utilisateur")
    .each(function () {
      if (
        $(this).find("nom").text() ==
        document.getElementById("txtLoginId").value
      ) {
        detruireUtilisateur(
          $(this).find("pk_utilisateur").text(),
          detruireUtilisateurSuccess,
          callbackError
        );
      }
    });
}
//Fonction pour dire que la modification a été faite avec succès

//Fonction pour détruire un utilisateur
function detruireUtilisateurSuccess() {
  console.log("l'utilisateur a été retiré de la DB");
  chargerUtilisateurs(chargerUtilisateursSuccess, callbackError);
}

//fonction appelé en cas de réussite de connection
function connectSuccess(data) {



  console.log("Vous êtes connecté");
 
  window.location.assign("index.html");

}

//fonction pour dire que l'utilisateur est crée avec succès
function créerUtilisateurSuccess(data) {
  console.log("La création d'un utilisateur a réussi");
  

}


//fonction appelé en cas de réussite de deconnection
function deconnectSuccess(data) {
 


  console.log("Vous êtes déconnecté");
  
}
//fonction appelé dans le cas où une requête n'a pas abouti
function callbackError() {
  console.log("la requête n'a pas abouti");
  
}
/*Cette fonction est appelée lors de l'appui du bouton.
Elle vas appeler la fonction qui vas envoyer une requête http 
en lui donnant le contenu des deux textfield en paramètre ainsi que des callBack methodes*/
function connect() {
  login(
    document.getElementById("txtLoginId").value,
    document.getElementById("txtLoginPw").value,
    connectSuccess,
    callbackError
  );
}
//fonction permettant de faire un nouvel utilisateur
function nouveau() {
  créerUtilisateur(
    document.getElementById("txtLoginId").value,
    document.getElementById("txtLoginPw").value,
    créerUtilisateurSuccess,
    callbackError
  );
}
//fonction permettant de supprimer un utilisateur
function suppr() {
  chargerUtilisateurs(preDelUtilisateursSuccess, callbackError);
}
//fonction modification (non utilisé)
function modif() {
  var utilisateur = new Utilisateur();
  utilisateur.setNom($(this).find("Nom").text());
  utilisateur.setPkUtilisateur($(this).find("PK_Utilisateur").text());
  utilisateur.setPswd($(this).find("Pswd").text());
  modifierUtilisateur(utilisateur, updateSuccess, callbackError);
}
//fonction pour la déconnexion
function deconnection() {
  deconnection(
    deconnectSuccess,
    callbackError
  );
}





/**
 * Méthode "start" appelée après le chargement complet de la page
 */
$(document).ready(function () {
  var cmbSuperhero = $("#cmbSuperhero");
  var superhero = '';

  $.getScript("javascripts/helpers/dateHelper.js", function () {
    console.log("dateHelper.js chargé !");
  });
  $.getScript("javascripts/beans/superhero.js", function () {
    console.log("superhero.js chargé !");
  });
  $.getScript("javascripts/beans/utilisateur.js", function () {
    console.log("superhero.js chargé !");
  });
  $.getScript("javascripts/services/servicesHttp.js", function () {
    console.log("servicesHttp.js chargé !");
    chargerSuperhero(chargerSuperheroSuccess, chargerSuperheroError);
    chargerUtilisateurs(chargerUtilisateursSuccess, callbackError);
  });
  /**cmbPays.change(function(event) {
    pays = this.options[this.selectedIndex].value;
    chargerSkieurs(JSON.parse(pays).pk, chargerSkieursSuccess, chargerSkieursError);
  });
  */

});

