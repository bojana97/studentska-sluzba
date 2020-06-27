<?php  require_once('includes/header.php'); ?>

<div class="wrapper">
	<div class="container" ></div>

	<?php      
	//Ispisivanje error poruka
		if(isset($_GET['msg'])){
			if( $_GET['msg'] == 'sqlerror'){
				echo '<p class="alert alert-danger"> Podaci nisu obrisani. Pokusajte ponovo.</p>';
			} elseif ($_GET['msg'] == 'success'){
				echo '<p class="alert alert-success"> Podaci su uspjesno obrisani.</p>';
			}
		}
	?>
</div>

