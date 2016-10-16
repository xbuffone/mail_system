<?php
require 'include/config.php';

function setSeparator($unique) {
	$bound = '---boundary'.md5(uniqid($unique));
	return $bound;
}

if($_POST) {
	if(isset($_POST["username"]) && isset($_POST["password"]))
	{
		if(count($login) <= 40) {
		    $login=htmlspecialchars(trim($_POST["username"]));
		    $password=htmlspecialchars(trim($_POST["password"]));

		    $userfile = $login.$mail_suffixe;

		    $userfilePath = $folder.'/'.$userfile;

			if(! is_dir( $folder )) {
				mkdir( $folder );
			}
				// Test si l'utilisateur est déjà existant
				if( !is_file( $userfilePath )) {
					$file = fopen($userfilePath, "a");
					// on genere le hash du mot de passe et on l'ajoute au fichier
					$hash = password_hash($password, PASSWORD_BCRYPT);
					fputs($file, $hash.PHP_EOL);
					// on genere le separateur unique et on l'ajoute au fichier
					$separator = setSeparator($login);
					// on ajoute un retour chariot
					fputs($file, $separator.PHP_EOL);
					fclose($file);

					header('Location: login.php');
				}
				else {
					$errMsg = "Utilisateur ".$login." déjà existant.";
				}
		}
		$errMsg = "L'identifiant doit faire un maximum de 40 caractères.";
	}
	else {
		$errMsg = "Champs invalides";
	}
}

require 'views/viewRegister.php';