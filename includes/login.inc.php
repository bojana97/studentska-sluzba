<?php

if (isset($_POST['prijava-submit'])){

    require_once("../database.php");

    $ime=$_POST['korisnicko_ime'];
    $lozinka=$_POST['lozinka'];

    if(empty($ime) || empty($lozinka)){
        header('Location: ../login.php?error=emptyfields');
        exit();
    }else{
        $sql="SELECT * FROM korisnici WHERE ime=?";
        $stmt=mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../login.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $ime);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);

            if($row=mysqli_fetch_assoc($result)){
                    if($lozinka!==$row['lozinka']) {
                        header("Location: ../login.php?error=wrongpwd");
                        exit();
                    }elseif ($lozinka===$row['lozinka']){
                        session_start();                        
                        $_SESSION['id_korisnika']=$row['id_korisnika'];
                        header("Location: ../index.php");
                        exit();
                    }else{
                        header("Location: ../login.php?error=wrongpwd");
                        exit();
                    }
            }else{
                header("Location: ../login.php?error=nouser");
                exit();
            }
        }
    }

}else{
    header("Location: ../login.php");
    exit();
}

?>