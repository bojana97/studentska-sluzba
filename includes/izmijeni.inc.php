<?php

session_start();
if(!isset($_SESSION['id_korisnika'])){
	header('Location: ../login.php');
}

require_once '../config/database.php';

$brojindx=$_POST['brojindx'];
$jmbg=$_POST['jmbg'];
$ime=$_POST['ime'];
$ime_oca=$_POST['ime_oca'];
$prezime=$_POST['prezime'];
$datum=$_POST['dat'];
$id_smjera=$_POST['smjer'];
$telefon=$_POST['telefon'];
$godina=$_POST['godina'];

	$filename=$_FILES['upload_slike']['name'];
	$tmpname=$_FILES['upload_slike']['tmp_name'];
	$folder="uploadimgs/".$filename;
	move_uploaded_file($tmpname, $folder);


$update_query="UPDATE studenti SET 
									slika=?,
									jmbg=?,
									ime=?,
									ime_oca=?,
									prezime=?,
									datum_rodjenja=?,
									id_smjera=?,
									telefon=?,
									godina_studija=?
				WHERE br_indeksa=?";

$stmtUpdate=mysqli_stmt_init($connection);
mysqli_stmt_prepare($stmtUpdate, $update_query);
mysqli_stmt_bind_param($stmtUpdate, 'ssssssisis', $folder, $jmbg, $ime, $ime_oca, $prezime, $datum, $id_smjera, $telefon, $godina, $brojindx);
	
	if(!mysqli_stmt_execute($stmtUpdate)){
		header('Location: ../izmjeni.php?msg=sqlerror');
	}else{
		header('Location: ../izmijeni.php?msg=success');

	}


?>