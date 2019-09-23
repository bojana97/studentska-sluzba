<?php require_once('includes/header.php'); ?>

<div class="wrapper">
	<div class="head-container">
		<h5>Ispis informacija o polozenim predmetima</h5>
	</div>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="search" name="search_polje" placeholder="Unesite br. indeksa.."/>
		<button type="submit" name="search-submit" class="btn btn-primary">Pretrazi</button>
	</form>
	
<?php

	if(isset($_POST['search-submit'])){
		require_once 'database.php';

		if(empty($_POST['search_polje'])){
			header('Location: predmeti.php');
			exit();
		}else{
			$index=$_POST['search_polje'];
			
			$sql="SELECT studenti.br_indeksa, ime, prezime,
				predmeti.naziv_predmeta, datum_polaganja, ocjena FROM studenti JOIN
				studenti_predmeti ON studenti.br_indeksa=studenti_predmeti.br_indeksa JOIN
				predmeti ON predmeti.id_predmeta=studenti_predmeti.id_predmeta WHERE 
				studenti.br_indeksa=?";

			$stmt=mysqli_stmt_init($connection);
			mysqli_stmt_prepare($stmt, $sql);
			mysqli_stmt_bind_param($stmt, 's', $index);
			mysqli_stmt_execute($stmt);

			$rezultat=mysqli_stmt_get_result($stmt);
			$brRedova=mysqli_num_rows($rezultat);

			if($brRedova==0){
				header('Location: predmeti.php?error=noresult');
			}else{
				echo '<div class="container-tbl">';
				echo '<table class="table table-bordered table-striped table-sm table-hover">';
					echo '<tr>';
						echo '<th>Predmet</th>';
						echo '<th>Datum polaganja ispita</th>';
						echo '<th>Ocjena</th>';
					echo '</tr>';
					$red=mysqli_fetch_assoc($rezultat);
						echo '<div id="info-div"><p id="info-p">' .$red['br_indeksa'] .' ' .$red['ime'] .' '.$red['prezime'].'</p></div>';
					while($red=mysqli_fetch_assoc($rezultat)){
						echo "<tr style='background-color:#F5F5F5'>";
							echo "<td>" .$red['naziv_predmeta'] ."</td>";
							echo "<td>" .$red['datum_polaganja'] ."</td>";
							echo "<td>" .$red['ocjena'] ."</td>";
						}
					echo '</tr>';
					echo '</table>';
					echo '</div>';
				}
		}
	}
?>

</div>
</div>
</body>
</html>