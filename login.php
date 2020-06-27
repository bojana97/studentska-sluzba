<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"  content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="css/login.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <title>Login forma</title>
</head>

<body style="background-color:cadetblue">
 <div class="container">
	<div class="login-form col-md-4  offset-md-4">
	<h4 style="text-align:center">Studentska sluzba "APEIRON"</h4>

	<!-- Ispis error poruka -->
	<?php
		if (isset($_GET['error'])){
			if(($_GET['error'])=='emptyfields'){
				echo '<div class="alert alert-danger" role="alert">Popunite oba polja!</div>';
			}elseif(($_GET['error'])=='wrongpwd'){
				echo '<div class="alert alert-danger" role="alert">Pogresno unesena lozinka!</div>';
			}elseif(($_GET['error'])=='nouser'){
				echo '<div class="alert alert-danger" role="alert">Ne postoji korisnik sa unesenim podacima!</div>';
			}
		}
	?>

	<!-- Login forma  -->
		<form action="includes/login.inc.php" method="POST">
			<div class="form-group">
				<label class="lbl" for="Ime">Korisnicko ime</label>
				<input class="form-control"  type="text" name="korisnicko_ime" />
			</div>
			<div class="form-group">
				<label class="lbl" for="Lozinka">Lozinka</label>
				<input  class="form-control" type="password" name="lozinka"/>
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-block" type="submit" name="prijava-submit">Prijavi se</button>
			</div>
		</form>


	</div>
 </div>
</body>
</html>