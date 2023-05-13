<?php 
	include_once('connexion.php');
	include_once('../beans/Genre.php');
        
	/**
	* Classe genreBDManager
	*
	* Cette classe permet la gestion des genres dans la base de données dans l'exercice de debbugage
	*
	* @version 1.0
	* @author maraldik
	* 
	*/
	class GenreBDManager
	{
		/**
		* Fonction permettant la lecture des genre.
		* Cette fonction permet de retourner la liste des genre se trouvant dans la liste
		*
		* @return array de Genres
		*/
		public function readGenre()
		{
			$count = 0;
			$liste = array();
			$connection = new Connexion();
			$query = $connection->SelectQuery("select * from t_genre order by Nom", null);
			foreach($query as $data){
				$genre = new Genre($data['PK_Genre'], $data['Nom']);
				$liste[$count++] = $genre;
			}	
			return $liste;	
		}
		
		/**
		* Fonction permettant de retourner la liste des pays en XML.
		*
		* @return String. Liste des pays en XML
		*/
		public function getInXML()
		{
			$listeGenre = $this->readGenre();
			$result = '<listeGenre>';
			for($i=0;$i<sizeof($listeGenre);$i++) 
			{
				$result = $result .$listeGenre[$i]->toXML();
			}
			$result = $result . '</listeGenre>';
			return $result;
		}
	}
?>