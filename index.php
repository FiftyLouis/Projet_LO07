<?php session_start();
if (!isset($_SESSION['login'])) $_SESSION['login'] = "vide";
header('Location: app/router/router.php?action=Accueil');
exit;