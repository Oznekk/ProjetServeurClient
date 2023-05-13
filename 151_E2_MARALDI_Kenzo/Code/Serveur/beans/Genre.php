<?php 
  /**
  * Classe Genre
  *
  * Cette classe représente un genre.
  *
  * @version 1.0
  * @author Neuhaus Olivier <neuhauso@edufr.ch> modifié par Maraldi Kenzo
  * 
  */
  class Genre
  {
    /**
    * Variable représentant le nom du genre
    * @access private
    * @var string
    */
    private $nom;
    /**
    * Variable représentant la pk du genre
    * @access private
    * @var integer
    */
    private $pk_genre;

    /**
    * Constructeur de la classe Genre
    *
    * @param string $pk_pays. PK du genre
    * @param string nom. Nom du genre
    */
    public function __construct($pk_genre, $nom)
    {
      $this->nom = $nom;
      $this->pk_genre = $pk_genre;    
    }
    
    /**
    * Fonction qui retourne le nom du genre.
    *
    * @return string du genre.
    */
    public function getNom()
    {
      return $this->nom;
    }
    
    /**
    * Fonction qui retourne la pk du genre.
    *
    * @return string du genre.
    */
    public function getPkGenre()
    {
      return $this->pk_genre;
    }
    
    /**
    * Fonction qui retourne le contenu du bean au format XML
    * @return string contenu du bean au format XML
    */
    public function toXML()
    {
      $result = '<genre>';
      $result = $result . '<pk_genre>'.$this->getPkGenre().'</pk_genre>';
      $result = $result . '<nom>'.$this->getNom().'</nom>';
      $result = $result . '</genre>';
      return $result;
    }
  }
?>