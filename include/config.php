<?php
// Chemin du répertoire contenant les fichiers des utilisateurs
$folder = dirname(__DIR__) .'/users';
// Suffixe servant d'extension du nom des fichiers utilisateurs
$mail_suffixe = "@mail.fr";
// Taille max du fichier contenant les messages (en ko)
$msgSizeMax = 100;

$login = '';
// creation de la session
session_start();

function isLogged() {
	if(isset($_SESSION['login'])) {
		$login = $_SESSION['login'];
		return true;
	}
	else {
		return false;
	}
}