/*
 * Bean "Superhero".
 *
 * @author Maraldi Kenzo
 * @project Superhero
 * @version 1.0 / 03-03.2023
 */

var Superhero = function() {
};

/**
 * Setter pour le nom
 * @param String nom
 * @returns {undefined}
 */
Superhero.prototype.setNom = function(nom) {
  this.nom = nom;
};


/**
 * Setter pour le nom
 * @param String nom
 * @returns {undefined}
 */
Superhero.prototype.setDescription = function(description) {
  this.description = description;
};

Superhero.prototype.setFKGenre = function(fk_genre) {
  this.fk_genre = fk_genre;
};


Superhero.prototype.setFKPlanete = function(fk_planete) {
  this.fk_planete = fk_planete;
};




/**
 * Setter pour le pk du superhero
 * @param String nom
 * @returns {undefined}
 */
Superhero.prototype.setPk = function(pk) {
  this.pk = pk;
};



/**
 * Retourne le superhero en format texte
 * @returns Le superhero en format texte
 */
Superhero.prototype.toString = function () {
  return "Nom:" +this.nom + ", description: " + this.description + ", genre: " + this.fk_genre + ", planète: " + this.fk_planete;
};




