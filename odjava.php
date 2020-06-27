<?php

session_start();

if(!isset($_SESSION['id_korisnika'])){
	header('Location: login.php');
}else {
	session_unset($_SESSION['id_korisnika']);
	session_destroy();
	header('Location: login.php');
}

?>