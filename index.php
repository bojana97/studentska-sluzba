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
	<link rel="stylesheet" href="css/index1.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Pocetna stranica</title>
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
		  <li class="nav-item active">
			<a class="nav-link" href="index.php">Unos podataka</a>
		  </li>

		  <li class="nav-item ">
			<a class="nav-link" href="pretraga.php">Osnovni podaci</a>
		  </li>


		   <li class="nav-item">
			<a class="nav-link" href="predmeti.php">Predmeti</a>
		  </li>

		  <li class="nav-item">
			<a class="nav-link" href="finansije.php">Finansije</a>
		  </li>

		  <li class="nav-item">
			<a class="nav-link" href="odjava.php">Odjava</a>
		  </li>
		</ul>
	  </div>
	</nav>

<div class="wrapper" style="background-color: #C0C0C0; padding-bottom:30px;">
	<div class="container" style="text-align:center; padding:30px; color:white;">
		<H5>Unesite podatke  studenta</H5>
	</div>

	<!-- Forma za unos podataka studenta -->
    <form action="includes/index.inc.php" method="POST" enctype="multipart/form-data">
	<div class="container">
	<?php      
	//Ispisivanje error poruka
		if(isset($_GET['msg'])){
			if($_GET['msg']=='emptyfields'){
				echo '<p class="alert alert-danger">Popunite sva polja.</p>';
			}elseif($_GET['msg']=='sqlerror'){
				echo '<p class="alert alert-danger">Neispravan unos. Pokusajte ponovo.</p>';
			}elseif($_GET['msg']=='success'){
				echo '<p class="alert alert-success">Podaci su uspjesno uneseni.</p>';
			}
		}
	?>
	</div>

		

       <input type="text" name="br_indeksa" placeholder="Broj indeksa.."/>
		<input type="text" name="jmbg" placeholder="JMBG.."/>
        <input type="text" name="ime" placeholder="Ime.."/>
        <input type="text" name="ime_oca" placeholder="Ime oca.."/>
        <input type="text" name="prezime" placeholder="Prezime .."/>
		<input type="text" name="datumrodj" placeholder="Datum rodjenja.."/>
		<input type="text" name="telefon" placeholder="Telefon"/>
        <input type="text" name="smjer" placeholder="Smjer.."/>
        <input type="text" name="god_studija" placeholder="Godina studija.."/> 
		<p></p>
		<input type="file" name="upload_slike" />
		<p><p/>

        <button type="submit" name="sacuvaj-submit">Sacuvaj podatke</button>
     </form>
</div>
</body>
</html>

