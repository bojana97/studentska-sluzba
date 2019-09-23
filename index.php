<?php require_once 'includes/header.php';  ?>

<div class="wrapper">
  <div class="head-container">
	<h5>Unesite podatke  studenta</h5>
  </div>
 <form action="includes/index.inc.php" method="POST" enctype="multipart/form-data">
     <?php   if (isset($_GET['msg'])) :
				if ($_GET['msg'] == 'emptyfields') :
					echo '<p class="alert alert-danger">Popunite sva polja.</p>';
				elseif ($_GET['msg'] == 'sqlerror') :
					echo '<p class="alert alert-danger">Neispravan unos. Pokusajte ponovo.</p>';
				elseif ($_GET['msg'] == 'success') :
					echo '<p class="alert alert-success">Podaci su uspjesno uneseni.</p>';
				endif;
		     endif;
	?>
    <input type="text" name="br_indeksa" placeholder="Broj indeksa.."/>
	<input type="text" name="jmbg" placeholder="JMBG.."/>
    <input type="text" name="ime" placeholder="Ime.."/>
    <input type="text" name="ime_oca" placeholder="Ime oca.."/>
    <input type="text" name="prezime" placeholder="Prezime .."/>
	<input type="text" name="datumrodj" placeholder="Datum rodjenja.."/>
	<input type="text" name="telefon" placeholder="Telefon"/>
    <input type="text" name="smjer" placeholder="Smjer.."/>
    <input type="text" name="god_studija" placeholder="Godina studija.."/> 
	<input type="file" name="upload_slike" />
	<div id="btn-div"><input type="submit" name="sacuvaj-submit" value="Sacuvaj podatke"/></div>
  </form>
</div>
</body>
</html>

