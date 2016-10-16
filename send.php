<?php
require 'include/config.php';

isset($_SESSION['login'])? $login = $_SESSION['login'] : header('Location: login.php');


// retourne la 2eme ligne du fichier utilisateur qui contient le separateur
function getSeparatorFromFile($file)
{
		fseek($file, 0);
 		$hash = fgets($file, 4096);
 		$separator = fgets($file, 4096);
 		$separator = explode(PHP_EOL, $separator);
		return $separator[0];
}

if($_POST) {
	if(isset($_POST["destinataire"]) && isset($_POST["expediteur"]) && isset($_POST["message"]))
	{
		// on recupere les valeurs postées en evitant le XSS
	    $destinataire = htmlspecialchars(trim($_POST["destinataire"]));
	    $expediteur = htmlspecialchars(trim($_POST["expediteur"]));
	    $message = htmlspecialchars(trim($_POST["message"]));

	    $userfile = $destinataire.$mail_suffixe;

	    $userfilePath = $folder.'/'.$userfile;

		if( is_dir( $folder )) {
			if( is_file( $userfilePath )) {
				$file = fopen($userfilePath, "a+");
				// on recupere le separateur contenu dans le fichier
				$separator = getSeparatorFromFile($file);
				// on ajoute l'expediteur, le message et le separateur separés par des reours chaiot au fichier du destinataire
				fputs($file, $expediteur.PHP_EOL);
				fputs($file, $message.PHP_EOL);
				fputs($file, $separator.PHP_EOL);
				fclose($file);
				$successMsg = "Message envoyé à ".$destinataire.".";
				require 'views/viewSend.php';
				return true;
			}
			else {
				$errMsg = "Utilisateur ".$destinataire." inéxistant.";
			}
		}
		else {
			$errMsg = "Dossier invalide ".$userfilePath.".";
		}

	}
	else {
		$errMsg = "Veuillez remplir tous les champs.";
	}
}
require 'views/viewSend.php';