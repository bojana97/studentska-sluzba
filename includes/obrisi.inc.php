<?php

session_start();

	if(!isset($_SESSION['id_korisnika'])){
		header('Location: ../login.php');
	}

require_once('../database.php');

@$br_indeksa=$_GET['indx'];

$delete_query="DELETE FROM studenti WHERE br_indeksa=?";
$stmt=mysqli_stmt_init($connection);
mysqli_stmt_prepare($stmt, $delete_query);
mysqli_stmt_bind_param($stmt, 's', $br_indeksa);

	if(!mysqli_stmt_execute($stmt)){
		header('Location: ../obrisi.php?msg=sqlerror');
	}else{
		header('Location: ../obrisi.php?msg=success');
	}


?>