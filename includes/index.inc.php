<?php

if(isset($_POST['sacuvaj-submit'])){
	require '../database.php';

	$br_indeksa=$_POST['br_indeksa'];
	$jmbg=$_POST['jmbg'];
	$ime=$_POST['ime'];
	$ime_oca=$_POST['ime_oca'];
	$prezime=$_POST['prezime'];
	$dr=$_POST['datumrodj'];
	$telefon=$_POST['telefon'];
	$smjer=$_POST['smjer'];
	$godina=$_POST['god_studija'];


	if($smjer=="Poslovna informatika"){
		$smjer=1;
	}elseif($smjer=="Nastavnicka informatika"){
		$smjer=2;
	}

	
	$filename=$_FILES['upload_slike']['name'];
	$tmpname=$_FILES['upload_slike']['tmp_name'];
	$folder="uploadimgs/".$filename;
	move_uploaded_file($tmpname, $folder);

	if(empty($br_indeksa) || empty($jmbg) || empty($ime) || empty($ime_oca) || empty($prezime) || empty($dr) || empty($smjer) || empty($telefon) || empty($godina)){
		header('Location: ../index.php?msg=emptyfields');
		exit();
	}else{
		$sql="INSERT INTO studenti(br_indeksa, JMBG, ime, ime_oca, prezime, datum_rodjenja, id_smjera, telefon, godina_studija, slika) VALUES (?,?,?,?,?,?,?,?,?,?)";
		$stmt=mysqli_stmt_init($connection);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt, 'ssssssisis', $br_indeksa, $jmbg, $ime, $ime_oca, $prezime, $dr, $smjer, $telefon, $godina, $folder);
			if(!mysqli_stmt_execute($stmt)){
				header('Location: ../index.php?msg=sqlerror');
				exit();
			}else{
				header('Location: ../index.php?msg=success');
				exit();
			}
	}
	mysqli_close($connection);
	mysqli_stmt_close($stmt);   
	
}else{
	header('Location: ../index.php');
}

?>