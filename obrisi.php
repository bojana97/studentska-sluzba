<?php

session_start();

	if(!isset($_SESSION['id_korisnika'])){
		header('Location: login.php');
	}

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"  content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="index.css" type="text/css" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <title>Brisanje podataka</title>
</head>

<body>
<!-- Navigacja -->
<div class="container" >
	<nav class="navbar  sticky-top navbar-expand-md navbar-dark" style="background-color:#1E90FF;">

	  <a class="navbar-brand" href="#">Panevropski Univerzitet APEIRON</a>

	  <!-- Toggler button -->
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<!-- Toggler ikonica-->
		<span class="navbar-toggler-icon"></span>
	  </button>

	  <!-- Navbar linkovi -->
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">

		<ul class="navbar-nav ml-auto">
		  <li class="nav-item">
			<a class="nav-link" href="index.php">Unos podataka</a>
		  </li>

		  <li class="nav-item">
			<a class="nav-link" href="pretraga.php">Pretraga</a>
		  </li>

		  <li class="nav-item">
			<a class="nav-link" href="odjava.php">Odjava</a>
		  </li>
		</ul>

	  </div>
	</nav>

<div class="wrapper" style="background-color: #C0C0C0; padding-bottom:40px;">
	<div class="container" style="text-align:center; padding: 50px; color:white;">
		<h5></h5>
	</div>

	<?php      
	//Ispisivanje error poruka
		if(isset($_GET['msg'])){
			if($_GET['msg']=='sqlerror'){
				echo '<p class="alert alert-danger">Podaci nisu obrisani. Pokusajte ponovo.</p>';
			}elseif($_GET['msg']=='success'){
				echo '<p class="alert alert-success">Podaci su uspjesno obrisani.</p>';
			}
		}
	?>


</div>

