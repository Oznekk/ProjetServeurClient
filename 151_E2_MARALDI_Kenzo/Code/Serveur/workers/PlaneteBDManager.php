<?php 
	include_once('connexion.php');
	include_once('../beans/Planete.php');

        
	/**
	* Classe PlaneteBDManager
	*
	* Cette classe permet la gestion des superheros dans la base de donn�ees dans l'exercice de debuggage
	*
	* @version 1.0
	* @author Neuhaus Olivier <neuhauso@edufr.ch> modifié par Maraldi Kenzo
	* 
	*/
	class PlaneteBDManager
	{
		/**
		* Fonction permettant la lecture des coureurs pour une �quipe.
		* Cette fonction permet de retourner la liste des skieurs se trouvant dans un pays donné
		* @param int $fkEquipe. Id du pays dans lequel se retrouvent les skieurs
		* @return array de Skieur
		*/
		public function readPlanete()
		{
			$count = 0;
			$liste = array();
			$connection = new Connexion();
			$query = $connection->SelectQuery("select * from t_planete ", null);
			foreach($query as $data){
				$planete = new Planete($data['PK_Planete'], $data['Nom']);
				$liste[$count++] = $planete;
			}	
			return $liste;	
		}
		
		/**
		* Fonction permettant de retourner la liste des skieurs en XML.
		* @param int $fkEquipe. Id du pays dans lequel se retrouvent les skieurs
		* @return string. Liste des skieurs en XML
		*/
		public function getInXML()
		{
			$listPlanete = $this->readPlanete();
			$result = '<listePlanete>';
			for($i=0;$i<sizeof($listPlanete);$i++) 
			{
				$result = $result .$listPlanete[$i]->toXML();
			}
			$result = $result . '</listePlanete>';
			return $result;
		}
	}
?>