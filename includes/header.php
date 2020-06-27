<?php
session_start();
if (!isset ($_SESSION['id_korisnika'])) {
	header ('Location: login.php' );
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"  content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/index1.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Pocetna stranica</title>
</head>
<body>
<div class="container" >
	<nav id="navigation" class="navbar  sticky-top navbar-expand-md navbar-dark" style="background-color:#1E90FF;">
	  <a class="navbar-brand" href="#">Panevropski Univerzitet APEIRON</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
		  <li class="nav-item">
			<a class="nav-link"  href="index.php">Unos podataka</a>
		  </li>
		  <li class="nav-item ">
			<a class="nav-link"  href="pretraga.php">Osnovni podaci</a>
		  </li>
		   <li class="nav-item">
			<a class="nav-link " href="predmeti.php">Predmeti</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link"  href="finansije.php">Finansije</a>
		  </li>
		  <li class="nav-item">
			<a class="nav-link" href="odjava.php">Odjava</a>
		  </li>
		</ul>
	  </div>
	</nav>

