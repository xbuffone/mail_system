<?php
require 'include/config.php';
// si l'utilisateur est identifié il est redirigé vers l'interface de messages sinon vers la page d'identification
isset($_SESSION['login']) ? header('Location: read.php') : header('Location: login.php');