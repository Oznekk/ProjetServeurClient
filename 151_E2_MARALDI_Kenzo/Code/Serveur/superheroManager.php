<?php 
/*
 * Request method de type getter,post pour les superhero
 *
 * @author Maraldi Kenz0
 * @version 1.0 / 13.05.2023
 */
	session_start();
	include_once('workers/SuperheroBDManager.php');
	include_once('beans/Superhero.php');
	include_once('WorkerSession.php');

$wrkSession = new WorkerSession();

$superheroDBManager = new SuperheroBDManager();

if (isset($_SERVER['REQUEST_METHOD'])) {
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $bdReader = new SuperheroBDManager();
			echo $bdReader->getInXML();
            break;
        case 'POST':
            parse_str(file_get_contents("php://input"), $vars);
            if ($wrkSession->isOpen() and isset($vars['pkSuperhero']) and isset($vars['nomSuperhero']) and isset($vars['description']) and isset($vars['fkGenre']) and isset($vars['fkPlanete'])) {
                $tempSuper = $superheroDBManager->readUnSuperhero($vars['pkSuperhero']);
				if($tempSuper == null){
				echo $superheroDBManager->createSuperhero(new Superhero($vars['pkSuperhero'], $vars['nomSuperhero'], $vars['description'], $vars['fkGenre'], $vars['fkPlanete']));
                http_response_code(200);
			}else{
				echo("Le superhéro existe déjà");
				http_response_code(405);
			}
            } else {
                http_response_code(404);
            }
            break;
			/**
        *case 'PUT':
           * parse_str(file_get_contents("php://input"), $vars);
            *if ($wrkSession->isOpen() and isset($vars['pkOeuvre']) and isset($vars['nomOeuvre']) and isset($vars['auteur'])) {
              *  echo $oeuvreDBManager->updateOeuvre(new Oeuvre($vars['pkOeuvre'], $vars['nomOeuvre'], $vars['auteur']));
                *http_response_code(200);
           * } else {
               * http_response_code(404);
           * }
           * break;
        *case 'DELETE':
            *parse_str(file_get_contents("php://input"), $vars);
            *if ($wrkSession->isOpen() and isset($vars['pkOeuvre'])) {
                *echo $oeuvreDBManager->deleteOeuvre($vars['pkOeuvre']);
               * http_response_code(200);
           * } else {
                *http_response_code(404);
           * }
            *break;
			*/
    }
}
