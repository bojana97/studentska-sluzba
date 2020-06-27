<?php  require_once('includes/header.php'); ?>
<div class="wrapper">
	<div class="head-container">
		<h5>Ispis osnovnih podataka o studentu</h5>
	</div>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="search" name="search_polje" placeholder="Unesite br. indeksa.."/>
		<button type="submit" name="search-submit" class="btn btn-primary">Pretrazi</button>
	</form>
	

<?php
	if(isset($_POST['search-submit'])){
		require_once 'config/database.php';

		if(empty($_POST['search_polje'])){
			header('Location: pretraga.php');
			exit();
		}else{
			$search=$_POST['search_polje'];
			$sql="SELECT br_indeksa, JMBG, ime, prezime, telefon, naziv, naziv_smjera, godina_studija, slika FROM studenti
			 JOIN smjer ON smjer.id_smjera=studenti.id_smjera 
			 JOIN fakultet ON smjer.id_fkt=fakultet.id_fkt                         
			 WHERE br_indeksa=?";                                  //upit selektovanja baze
			$stmt=mysqli_stmt_init($connection);
			mysqli_stmt_prepare($stmt, $sql);              //priprema stmt
			mysqli_stmt_bind_param($stmt, 's', $search);  //povezivanje parametara
			mysqli_stmt_execute($stmt);

			$rezultat=mysqli_stmt_get_result($stmt);
			$brRedova=mysqli_num_rows($rezultat);    //vraca broj rekorda iz baze

			if($brRedova==0){
				header('Location: pretraga.php?msg=nouser');
				exit();
			}else{
				echo '<div class="container" style="margin-top:60px; text-align:center; width:95%;">';
				echo '<table class="table table-bordered table-sm table-hover">';
					echo '<tr style="background-color:#A9A9A9; text-align:center; color:white;">';
						echo '<th>Br.indexa</th>';
						echo '<th>JMBG</th>';
						echo '<th>Ime</th>';
						echo '<th>Prezime</th>';
						echo '<th>Fakultet</th>';
						echo '<th>Smjer</th>';
						echo '<th>Godina studija</th>';
						echo '<th>Opcije</th>';
					echo '</tr>';
					

					while($red=mysqli_fetch_assoc($rezultat)){  //isps kao asocijativni niz
					//Prikaz slike
					echo "<img  src='".$red['slika']."' style='display:inline-block; margin:30px 10px; height:150px; width:150px;'/>";
					echo "<tr style='background-color:#F5F5F5; text-align:center;'>";
						echo "<td>" .$red['br_indeksa'] ."</td>";
						echo "<td>" .$red['JMBG'] ."</td>";
						echo "<td>" .$red['ime'] ."</td>";
						echo "<td>" .$red['prezime'] ."</td>";
						echo "<td>" .$red['naziv'] ."</td>";
						echo "<td>" .$red['naziv_smjera'] ."</td>";
						echo "<td>" .$red['godina_studija'] ."</td>";
						echo '<td><a class="btn btn-primary btn-sm" href="izmijeni.php?indx=' .$red['br_indeksa'] .'">Izmijeni</a>
							<a class="btn btn-danger btn-sm" href="includes/obrisi.inc.php?indx=' .$red['br_indeksa'].'">Obrisi</a></td>';
					}
					echo "</tr>";
					echo '</table>';				
					echo '</div>';
			}
		}
	}
?>

</div>


