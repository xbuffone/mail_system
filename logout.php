<?php
require 'include/config.php';
// destruction de la session et redirection vers la page d'identification
session_destroy();
header('Location: login.php');