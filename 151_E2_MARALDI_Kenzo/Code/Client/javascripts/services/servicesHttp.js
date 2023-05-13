/*
 * Couche de services HTTP (worker).
 *
 * @author Olivier Neuhaus
 * @version 1.0 / 13-SEP-2013
 */



var BASE_URL = "http://maraldik.emf-informatique.ch/151_E2_MARALDI_Kenzo/Code/Serveur/";

/**
 * Fonction permettant de demander la liste des superheros au serveur.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function chargerSuperhero(successCallback, errorCallback) {
  $.ajax({
    type: "GET",
    dataType: "xml",
    url: BASE_URL + "superheroManager.php",
    success: successCallback,
    error: errorCallback
  });
}



/**
 * Méthode appelée en cas d'erreur lors de la lecture des skieurs
 * @param {type} request
 * @param {type} status
 * @param {type} error
 * @returns {undefined}
 */


/**
 * Fonction permettant de demander la liste des utilisateurs au serveur.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function chargerUtilisateurs(successCallback, errorCallback) {
  $.ajax({
    type: "GET",
    dataType: "xml",
    url: BASE_URL + "utilisateurManager.php",
    success: successCallback,
    error: errorCallback,
  });
}
/**
 * On fais une requête http de type POST dans laquel on envoi l'identifiant 
 * et le mdp pour s'identifier.
 * @param {string} identifiant l'identifiant entré par l'utilisateur
 * @param {string} mdp le mdp entré par l'utilisateur
 * @param {function} successCallback fonction appelé en cas de réussite
 * @param {function} errorCallback fonction appelé en cas d'échec
 */
function login(identifiant, mdp, successCallback, errorCallback) {
  $.ajax({
    type: "POST",
    //dataType: "",
    url: BASE_URL + "utilisateurManager.php",
    data: "nom=" + identifiant + "&pswd=" + mdp,
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Fonction permettant de modifier un utilisateur depuis le server.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function modifierUtilisateur(utilisateur, successCallback, errorCallback) {
  $.ajax({
    type: "PUT",
    dataType: "xml",
    url: BASE_URL + "utilisateurManager.php",
    data:
      "pk_utilisateur=" +
      utilisateur.getPkUtilisateur() +
      "&nom=" +
      utilisateur.getNom() +
      "&pswd=" +
      utilisateur.getPswd(),
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Fonction permettant de detruire un utilisateur depuis le server.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function detruireUtilisateur(pkutilisateur, successCallback, errorCallback) {
  $.ajax({
    type: "DELETE",
    //dataType: "xml",
    url: BASE_URL + "utilisateurManager.php",
    data: "pk_utilisateur=" + pkutilisateur,
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * On fais une requête http de type get pour la deconnexion
 * et le mdp pour s'identifier.
 
 * @param {function} successCallback fonction appelé en cas de réussite
 * @param {function} errorCallback fonction appelé en cas d'échec
 */
function deconnection(successCallback, errorCallback) {
  $.ajax({
    type: "GET",
    //dataType: "",
    url: BASE_URL + "deconnection.php",
    success: successCallback,
    error: errorCallback,
  });
}

/**
 * Fonction permettant de créer un utilisateur depuis le server.
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function créerUtilisateur(identifiant, mdp, successCallback, errorCallback) {
  $.ajax({
    type: "POST",
    //dataType: "xml",
    url: BASE_URL + "utilisateurManager.php",
    data:
      "pk_utilisateur=" +
      "3" +
      "&nom=" +
      identifiant +
      "&pswd=" +
      mdp,
    success: successCallback,
    error: errorCallback,
  });
}


