/*
 * Bean "Utilisateur".
 *
 * @author Maraldi Kenzo
 * @project Utilisateur
 * @version 1.0 / 03-03.2023
 */

var Utilisateur = function() {
};

/**
 * Setter pour le nom
 * @param String nom
 * @returns {undefined}
 */
Utilisateur.prototype.setNom = function(nom) {
  this.nom = nom;
};


/**
 * Setter pour le nom
 * @param String nom
 * @returns {undefined}
 */


Utilisateur.prototype.setPswd = function(pswd) {
  this.pswd=pswd;
};


/**
 * Setter pour le pk de l'utilisateur
 * @param String nom
 * @returns {undefined}
 */
Utilisateur.prototype.setPkUtilisateur = function(pk) {
  this.pk = pk;
};

/**
 *Getter pour l'utilisateur
 * @param String nom
 * @returns {undefined}
 */
Utilisateur.prototype.getNom = function() {
  return this.nom;
};

/**
 *Getter pour le pk utilisateur
 * @param String nom
 * @returns {undefined}
 */
 Utilisateur.prototype.getPkUtilisateur = function() {
  return this.pk;
};

/**
 *Getter pour le pk mot de passe
 * @param String nom
 * @returns {undefined}
 */
 Utilisateur.prototype.getPswd = function() {
  return this.pswd;
};





/**
 * Retourne le superhero en format texte
 * @returns Le superhero en format texte
 */
Utilisateur.prototype.toString = function () {
  return this.nom;
};




