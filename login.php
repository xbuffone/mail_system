<?php
require 'include/config.php';

// test si les champs login et password sont renseignés
if($_POST)
{
    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
    	// on evite les failles XSS
        $login = htmlspecialchars(trim($_POST["username"]));
        $password = htmlspecialchars(trim($_POST["password"]));

        // configuration du nom et du chemin du fichier de l'utilisateur
        $email = $login.$mail_suffixe;
        $userfilePath = $folder.'/'.$email;

        // Test si l'utilisateur dispose d'un fichier, donc d'un compte
        if( is_file( $userfilePath )) {
            $file = fopen($userfilePath, "r");
            // on recupere la premiere ligne qui contient le hash du mot de passe
        	$fileContent = fgets($file, 1024);
    		//$hash = str_replace(array("\r\n","\n"), "", $fileContent);
    		$hash = str_replace(PHP_EOL, "", $fileContent);
            // test du mot de passe et redirection vers la page principale
        	if (password_verify($password, $hash)) {

                $_SESSION['login'] = $login;
                $_SESSION['email'] = $email;
    			header('Location: read.php');
    			//require  'views/viewMessages.php';
    		}
            else {
                $errMsg = "Mot de passe invalide";
            }
        }
        else {
            $errMsg = "Utilisateur ".$login." inexistant, vous devez d'abord créer votre compte.";
        }
    }
    else {
        $errMsg = "Vous devez remplir tous les champs";
    }
}
require  'views/viewLogin.php';