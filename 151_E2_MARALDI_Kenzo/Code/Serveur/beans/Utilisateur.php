<?php 
  /**
  * Classe Genre
  *
  * Cette classe représente un utilisateur
  *
  * @version 1.0
  * @author Neuhaus Olivier <neuhauso@edufr.ch> modifié par Maraldi Kenzo
  * 
  */
  class Utilisateur
  {
    /**
    * Variable représentant le nom de l'utilisateur
    * @access private
    * @var string
    */
    private $nom;
    /**
    * Variable représentant la pk du genre
    * @access private
    * @var string
    */
    private $pk_utilisateur;


    /**
    * Variable représentant la pk du genre
    * @access private
    * @var string
    */
    private $pswd;
    /**
    * Constructeur de la classe Genre
    *
    * @param string $pk_pays. PK du genre
    * @param string nom. Nom du genre
    */
    public function __construct($pk_utilisateur, $nom, $pswd)
    {
      $this->nom = $nom;
      $this->pswd = $pswd;
      $this->pk_utilisateur = $pk_utilisateur; 
      
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
    * Fonction qui retourne le nom du genre.
    *
    * @return string du genre.
    */
    public function getPswd()
    {
      return $this->pswd;
    }
    
    /**
    * Fonction qui retourne la pk du genre.
    *
    * @return string du genre.
    */
    public function getPkUtilisateur()
    {
      return $this->pk_utilisateur;
    }
    
    /**
    * Fonction qui retourne le contenu du bean au format XML
    * @return string contenu du bean au format XML
    */
    public function toXML()
    {
      $result = '<utilisateur>';
      $result = $result . '<pk_utilisateur>'.$this->getPkUtilisateur().'</pk_utilisateur>';
      $result = $result . '<nom>'.$this->getNom().'</nom>';
      $result = $result . '<pswddefaulthash>'.$this->getPswd().'</pswddefaulthash>';
      $result = $result . '</utilisateur>';
      return $result;
    }
  }
?>