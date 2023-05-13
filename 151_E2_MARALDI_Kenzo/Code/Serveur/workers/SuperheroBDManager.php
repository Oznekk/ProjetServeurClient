<?php
include_once("connexion.php");
include_once("beans/Superhero.php");


/**
 * Classe skieurBDManager
 *
 * Cette classe permet la gestion des skieurs dans la base de donn�ees dans l'exercice de debuggage
 *
 * @version 1.0
 * @author Neuhaus Olivier <neuhauso@edufr.ch> modifié par Maraldi Kenzo
 * 
 */
class SuperheroBDManager
{
	/**
	 * Fonction permettant la lecture des coureurs pour une �quipe.
	 * Cette fonction permet de retourner la liste des skieurs se trouvant dans un pays donné
	 * @param int $fkEquipe. Id du pays dans lequel se retrouvent les skieurs
	 * @return array de Skieur
	 */
	public function readSuperhero()
	{
		$count = 0;
		$list = array();
		$connection = new Connexion();
		$query = $connection->SelectQuery("select * from t_superhero", null);
		foreach ((array) $query as $data) {
			$leSuperhero = new Superhero($data['PK_Superhero'], $data['Nom'], $data['Description'], $data['FK_Genre'], $data['FK_Planete']);
			$list[$count++] = $leSuperhero;
		}
		return $list;
	}

	public function createSuperhero($superhero)
	{
		$query = "INSERT INTO t_superhero (PK_Superhero, Nom, Description, FK_Genre, FK_Planete) values(:pk, :nom, :descrip, :fkgenre, :fkplanete)";
		$params = array('pk' => $superhero->getPkSuperhero(), 'nom' => $superhero->getNom(), 'descrip' => $superhero->getDescription(), 'fkgenre' => $superhero->getFkGenre(), 'fkplanete' => $superhero->getFkPlanete());
		connexion::getInstance()->ExecuteQuery($query, $params);
		return connexion::getInstance()->GetLastId('t_superhero');
	}

	public function readUnSuperhero($pk)
	{
		$query = "SELECT * FROM t_superhero WHERE PK_Superhero = :id";
		$params = array('id' => $pk);


		$res = connexion::getInstance()->SelectQuery($query, $params);
		if ($res != null) {
			$data = $res[0];
			$superhero = new Superhero($data['PK_Superhero'], $data['Nom'], $data['Description'], $data['FK_Genre'], $data['FK_Planete']);
		}else{
			$superhero = null;

		}

		return $superhero;
	}

	/**
	 * Fonction permettant de retourner la liste des skieurs en XML.
	 * @param int $fkEquipe. Id du pays dans lequel se retrouvent les skieurs
	 * @return string Liste des skieurs en XML
	 */
	public function getInXML()
	{
		$listSuperheros = $this->readSuperhero();
		$result = '<listSuperheros>';
		for ($i = 0; $i < sizeof($listSuperheros); $i++) {
			$result = $result . $listSuperheros[$i]->toXML();
		}
		$result = $result . '</listSuperheros>';
		return $result;
	}
}
