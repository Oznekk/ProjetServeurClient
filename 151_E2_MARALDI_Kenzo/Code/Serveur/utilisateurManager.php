<?php
/*
 * Request method de type getter,post,put et delete pour les utilisateurs
 *
 * @author Maraldi Kenz0
 * @version 1.0 / 13.05.2023
 */
session_start();
include_once('workers/connexion.php');
include_once('workers/configConnexion.php');
include_once('workers/UtilisateurBDManager.php');
include_once('beans/Utilisateur.php');
include_once('WorkerSession.php');



/**if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$bdReader = new UtilisateurBDManager();
	echo $bdReader->getInXML();
}
 */
$wrkSession = new WorkerSession();
$wrkSession->setConnexion("test");
$utilisateurDBManager = new UtilisateurBDManager();

if ($_SERVER['REQUEST_METHOD']) {
	switch ($_SERVER['REQUEST_METHOD']) {
		case 'GET':

            echo $utilisateurDBManager->readUtilisateur();
            http_response_code(200);
            break;	

		case 'POST':
			parse_str(file_get_contents("php://input"), $vars);

			//pour créer user
			if ($wrkSession->isOpen() and isset($vars['pk_utilisateur']) and isset($vars['nom']) and isset($vars['pswd'])) {

				$user = $utilisateurDBManager->readUnUtilisateur($vars['nom']);

				if ($user == null) {
					echo $utilisateurDBManager->creatUtilisateur(new Utilisateur($vars['pk_utilisateur'], $vars['nom'], $vars['pswd']));
					http_response_code(200);
				} else {
					echo ("l'utilisateur existe déjà");
					http_response_code(403);
				}


				//pour ouvrir session

			} elseif (isset($vars['nom']) and isset($vars['pswd'])) {


				$user = $utilisateurDBManager->readUnUtilisateur($vars['nom']);

				if ($user != null) {
					if (password_verify($vars['pswd'], $user->getPswd())) {

						$wrkSession->setConnexion($user->getPkUtilisateur());

						echo ($wrkSession->getconnection());
						echo ("session ouverte");
					} else {

						$wrkSession->close();

						http_response_code(405);
					}
				} elseif ($wrkSession->isOpen()) {
					echo ("utilisateur non existant, veuillez le créer!");
					http_response_code(404);
				} else {

					echo ("Vous n'avez la permission, car vous n'êtes pas connecté!!");
					http_response_code(403);
				}
			}
			break;
	
		case 'DELETE':
			//ici cela permet de supprimer un utilisateur
			parse_str(file_get_contents("php://input"), $vars);

            if ($wrkSession->isOpen() and isset($vars['pk_utilisateur'])) {
				//ON supprime l'utilisateur avec la même pk grâce à la méthode deleteUtilisateur.
                echo $utilisateurDBManager->deleteUtilisateur($vars['pk_utilisateur']);
                http_response_code(200);

            } else {

                http_response_code(404);

            }
            break;
	}
}
