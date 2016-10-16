<?php
require 'include/config.php';
isset($_SESSION['login'])? $login = $_SESSION['login'] : header('Location: login.php');

$msgSizeMax = 100;

// on definit le nom du fichier
$userfile = $login.$mail_suffixe;
// on definit le chemin du fichier
$userfilePath = $folder.'/'.$userfile;

if( is_dir( $folder )) {
	if( is_file( $userfilePath )) {
		// stock le contenu du fichier dans un tableau
		$arrayFile = file($userfilePath);
		// on reecrit uniquement le hash et le separateur dans le fichier
		//file_put_contents($userfilePath, implode(PHP_EOL, array($arrayFile[0], $arrayFile[1])));
		file_put_contents($userfilePath, implode('', array($arrayFile[0], $arrayFile[1])));
		$successMsg = "Messages effacés";
		// stockage du message dans la session
		$_SESSION['successMsg'] = $successMsg;
	}
	else {
		$errMsg = "Utilisateur ".$destinataire." inéxistant.";
	}
}
else {
	$errMsg = "Dossier invalide ".$userfilePath;
}
isset($errMsg) ? $_SESSION['errMsg'] = $errMsg : null;
//require 'views/viewMessages.php';
header('Location: read.php');