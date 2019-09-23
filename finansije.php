<?php require_once('includes/header.php'); ?>

<div class="wrapper" >
	<div class="head-container">
		<h5>Ispis informacija o finansijama</h5>
	</div>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="search" name="search_polje" placeholder="Unesite br. indeksa studenta.." />
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
			
			$sql="SELECT br_indeksa, ime, prezime, duguje, potrazuje, broj_uplacenih, datum_zadnje_uplate
			FROM studenti 
			JOIN finansije ON 
			studenti.id_finansija=finansije.id_finansija 
			WHERE br_indeksa=?";

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
						echo '<th>Broj indeksa</th>';
						echo '<th>Ime</th>';
						echo '<th>Prezime</th>';
						echo '<th>Duguje</th>';
						echo '<th>Potrazuje</th>';
						echo '<th>Broj uplacenih</th>';
						echo '<th>Datum zadnje uplate</th>';

					echo '</tr>';
				
					while($red=mysqli_fetch_assoc($rezultat)){
						echo "<tr style='background-color:#F5F5F5'>";
							echo "<td>" .$red['br_indeksa'] ."</td>";
							echo "<td>" .$red['ime'] ."</td>";
							echo "<td>" .$red['prezime'] ."</td>";
							echo "<td>" .$red['duguje'] ."</td>";
							echo "<td>" .$red['potrazuje'] ."</td>";
							echo "<td>" .$red['broj_uplacenih'] ."</td>";
							echo "<td>" .$red['datum_zadnje_uplate'] ."</td>";
						}
					echo "</tr>";
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