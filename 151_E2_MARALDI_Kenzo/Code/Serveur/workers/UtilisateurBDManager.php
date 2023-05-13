<?php
/*
 * DBManager pour les requêtes utilisateur
 *
 * @author Maraldi Kenz0
 * @version 1.0 / 13.05.2023
 */
include_once('connexion.php');
include_once('beans/Utilisateur.php');


/**
 * Classe UtilisateurBDManager
 *
 * Cette classe permet la gestion des utilisateurs
 *
 * @version 1.0
 * @author Neuhaus Olivier <neuhauso@edufr.ch>
 * @project Exercice 10 - debuggage
 */
class UtilisateurBDManager
{
	/**
	 * Fonction permettant la lecture des utilisateurs
	 * Cette fonction permet de retourner la liste des utilisateurs
	 * @return array de Skieur
	 */
	public function readUtilisateur()
	{
		
			$query = "SELECT * FROM t_utilisateur";
			$res = connexion::getInstance()->SelectQuery($query, array());
			$utilisateurs = '<utilisateurs>';
			foreach ($res as $data) {
				$utilisateur = new Utilisateur($data['PK_Utilisateur'], $data['Nom'], $data['Pswd']);
				$utilisateurs .= $utilisateur->toXML();
			}
			$utilisateurs .= '</utilisateurs>';
			return $utilisateurs;
		
	}
/**
	 * Fonction permettant la lecture de un utilisateur
	 * Cette fonction permet de retourner un utilisateur
	 * 
	 */
	public function readUnUtilisateur($nom)
    {
        $query = "SELECT * FROM t_utilisateur WHERE Nom = :id";
        $params = array('id' => $nom);
		
		
        $res = connexion::getInstance()->SelectQuery($query, $params);
		if ($res != null) {
		$data = $res[0];
        $utilisateur = new Utilisateur($data['PK_Utilisateur'], $data['Nom'], $data['Pswd']);
		}else{
			$utilisateur = null;
		}
        return $utilisateur;
    }
/**
	 * Fonction permettant le création d'utilisateur
	 * Cette fonction permet de retourner l'utilisateur créer pour l'ajouter à la db
	 * 
	 */
	public function creatUtilisateur($utilisateur)
	{
		
		$query = "INSERT INTO t_utilisateur (PK_Utilisateur, Nom, Pswd) values (NULL, :id, :mdp)";

		$params = array('id' => $utilisateur->getNom(), 'mdp' => password_hash($utilisateur->getPswd(), PASSWORD_DEFAULT));
		
		connexion::getInstance()->ExecuteQuery($query, $params);

		return connexion::getInstance()->GetLastId('t_utilisateur');
	}
/**
	 * Fonction permettant la modification utilisateur
	 * Cette fonction permet de modifier et redonner les modifications d'un utilisateur
	 */
	public function updateUtilisateur($utilisateur)
    {
        $query = "UPDATE t_utilisateur set Nom = :id , Pswd = :mdp where PK_Utilisateur = :pk";
        $params = array('id' => htmlentities($utilisateur->getNom()), 'mdp' => htmlentities(password_hash($utilisateur->getPswd(), PASSWORD_DEFAULT)), 'pk' => htmlentities($utilisateur->getPkUtilisateur()));
        $res = connexion::getInstance()->ExecuteQuery($query, $params);
        return $res;
    }
/**
	 * Fonction permettant la suppression utilisateur
	 * Cette fonction permet de supprimer un utilisateur
	 */
    public function deleteUtilisateur($pk_utilisateur)
    {
        $query = "DELETE from t_utilisateur where PK_Utilisateur = :pk";
        $params = array('pk' => htmlentities($pk_utilisateur));
        $res = connexion::getInstance()->ExecuteQuery($query, $params);
        return $res;
    }

	/**
	 * Fonction permettant de retourner la liste des utilisateurs en XML.
	 * @return string Liste des skieurs en XML
	 */
	public function getInXML()
	{
		$listUtilisateurs = $this->readUtilisateur();
		$result = '<listUtilisateurs>';
		for ($i = 0; $i < sizeof($listUtilisateurs); $i++) {
			$result = $result . $listUtilisateurs[$i]->toXML();
		}
		$result = $result . '</listUtilisateurs>';
		return $result;
	}
}
