<?php
require 'include/config.php';
// session_start();
isset($_SESSION['login'])? $login = $_SESSION['login'] : header('Location: login.php');


if(isset($_SESSION['errMsg'])) {
	$errMsg = $_SESSION['errMsg'];
	unset($_SESSION['errMsg']);
}
if(isset($_SESSION['successMsg'])) {
	$errMsg = $_SESSION['successMsg'];
	unset($_SESSION['successMsg']);
}

$userfile = $login.$mail_suffixe;

$userfilePath = $folder.'/'.$userfile;

if( is_dir( $folder )) {
	if( is_file( $userfilePath )) {
		$msgSize = filesize($userfilePath);
		// convert octects to ko
		$msgSize = $msgSize/1024;
		$ratio = ($msgSize*100)/100;

		$file = fopen($userfilePath, "r");

		$fileContent = "";
		$lignes = array();
		// on recupere et stocke le contenu du fichier
		while(!feof($file)) {
			$ligne = fgets($file, 4096);
			if($ligne != PHP_EOL)  {
 		 		$fileContent .= $ligne;
 		 		$lignes[] = $ligne;
 		 	}
		}
		fclose($file);

		$delimiteur = $lignes[1];
		$msgArray = explode($delimiteur, $fileContent);
		// on supprime le hash et le dernier retour chariot
		$hash = array_shift($msgArray);
		$last = array_pop($msgArray);

		$messages = array();
		foreach ($msgArray as $key=>$value) {
			// on recupere chaque lignes dans un tableau, la premiere est l'expediteur et toutes les autres le corps du message, qu'on refusionne, et on en remplace les retours chariots par l'equivalent html
			$value = explode(PHP_EOL, trim($value));
			$messages[$key]['expediteur'] = $value[0];
			$messages[$key]['body'] = array_slice($value, 1);
			$messages[$key]['body'] = nl2br(implode(PHP_EOL, $messages[$key]['body']));
		}
		$successMsg = "Messages chargés.";
	}
	else {
		$errMsg = "Utilisateur ".$user." inéxistant.";
	}
}
else {
	$errMsg = "Dossier invalide ".$folder;
}

require 'views/viewMessages.php';