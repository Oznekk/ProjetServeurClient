<?php

/**
 * Classe Superhero
 *
 * Cette classe représente un superhero.
 *
 * @version 1.0
 * @author Neuhaus Olivier <neuhauso@edufr.ch> modifié par Maraldi Kenzo
 * 
 */
class Superhero {

  /**
   * Variable représentant le nom du superhero.
   * @access private
   * @var string
   */
  private $nom;

  /**
   * Variable représentant la description du superhero.
   * @access private
   * @var string
   */
  private $description;

  /**
   * Variable représentant la pk du superhero.
   * @access private
   * @var string
   */
  private $pk_superhero;

    /**
   * Variable représentant la fkGenre du superhero
   * @access private
   * @var integer
   */
  private $fk_genre;
    /**
   * Variable représentant la fkPlanete du superhero.
   * @access private
   * @var integer
   */
  private $fk_planete;

  /**
   * Constructeur de la classe beanEquipe
   *
   * @param string $pkSuperhero. PK du superhero.
   * @param string $nom. Nom du superhero.
   * @param string $description Description du superhero
   * @param string $fkGenre Genre du superhero 
   * @param string $fkPlanete planète du superhero
   */
  public function __construct($pkSuperhero, $nom, $description, $fkGenre, $fkPlanete ) {
    $this->pk_superhero = $pkSuperhero;
    $this->nom = $nom;
    $this->description = $description;
    $this->fk_genre = $fkGenre;
    $this->fk_planete = $fkPlanete;
   
  }

  /**
   * Fonction qui retourne le nom du superhero
   *
   * @return string du superhero
   */
  public function getNom() {
    return $this->nom;
  }

  /**
   * Fonction qui retourne la pk du superhero
   *
   * @return pk du superhero
   */
  public function getPkSuperhero() {
    return $this->pk_superhero;
  }
  
   /**
   * Fonction qui retourne la description du superhero
   *
   * @return description du superhero
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * Fonction qui retourne le fkGenre du superhero
   *
   * @return fkGenre du superhero
   */
  public function getFkGenre() {
    return $this->fk_genre;
  }

  /**
   * Fonction qui retourne le fkPlanete du superhero
   *
   * @return fkPlanete du superhero
   */
  public function getFkPlanete() {
    return $this->fk_planete;
  }
  
  /**
  * Fonction qui retourne le contenu du bean au format XML
  * @return le contenu du bean au format XML
  */
  public function toXML()
  {
    $result = '<superhero>';
    $result = $result . '<pkSuperhero>'.$this->getPkSuperhero().'</pkSuperhero>';
    $result = $result . '<nom>'.$this->getNom().'</nom>';
    $result = $result . '<description>'.$this->getDescription().'</description>';
    $result = $result . '<FK_Genre>'.$this->getFkGenre().'</FK_Genre>';
    $result = $result . '<FK_Planete>'.$this->getFkPlanete().'</FK_Planete>';
    $result = $result . '</superhero>';
    return $result;
  }

}

?>