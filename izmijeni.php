<?php

require_once('database.php');
require_once('pretraga.php');

@$br_indeksa=$_GET['indx'];
$sql_query="SELECT * FROM studenti WHERE br_indeksa= ?";
$stmt_select=mysqli_stmt_init($connection);
mysqli_stmt_prepare($stmt_select, $sql_query);
mysqli_stmt_bind_param($stmt_select, 's', $br_indeksa);
mysqli_stmt_execute($stmt_select);

$rezultat_select=mysqli_stmt_get_result($stmt_select);
$redovi=mysqli_fetch_assoc($rezultat_select);


?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"  content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="index1.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <title>Izmijeni podatke</title>
</head>

<body>
	<div class="wrapper" style="background-color: #C0C0C0; padding-bottom:40px;">

	<!-- Forma za unos podataka studenta -->
	  <form action="includes/izmijeni.inc.php" method="POST" enctype="multipart/form-data">

<?php
	if(isset($_GET['msg'])){
		if($_GET['msg']=='sqlerror'){
			echo '<p class="alert alert-danger" role="alert">Greska pri unosu. Pokusajte ponovo.</p>';
		}elseif($_GET['msg']=='success'){
			echo '<p class="alert alert-success" role="alert">Podaci su uspjesno izmijenjeni.</p>';
		}
	}
?>

	<!-- Indeks -->
        <input type="hidden" name="brojindx"  value="<?php echo $_GET['indx']; ?>"/>

	<!-- Slika -->
		<!--<input type="file" name="upload_slike" value=""/> -->


	<div class="lbl">JMBG</div>
		<input type="text" name="jmbg" value="<?php echo $redovi['JMBG'];   ?>"/>

	<div class="lbl">Ime</div>
        <input type="text" name="ime"  value="<?php echo $redovi['ime'];   ?>"/>

	<div class="lbl">Ime oca</div>
        <input type="text" name="ime_oca" value="<?php echo $redovi['ime_oca'];   ?>"/>

	<div class="lbl">Prezime</div>
        <input type="text" name="prezime" value="<?php echo $redovi['prezime'];   ?>"/>

	<div class="lbl">Datum rodjenja</div>
		<input type="text" name="dat" value="<?php echo $redovi['datum_rodjenja'];   ?>"/>

	<div class="lbl">Telefon</div>
		<input type="text" name="telefon" value="<?php echo $redovi['telefon'];   ?>"/>

	<div class="lbl">Smjer</div>
        <input type="text" name="smjer" value="<?php echo $redovi['id_smjera'];   ?>"/>

	<div class="lbl">Godina studija</div>
		<input type="text" name="godina" value="<?php echo $redovi['godina_studija'];   ?>"/>
		<p></p>

		<input type="file" name="upload_slike" />
		<p><p/>

        <button type="submit" name="izmijeni-submit">Sacuvaj podatke</button>
		<button id="otkazi_btn"><a href="pretraga.php">Otkazi</a></button>
		
   </form>


	</div>
