<?php 
include("../../db/db.php");
if(isset($_POST['submit'])){
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if($pass === $cpass){
        $upd = "UPDATE recruiter SET password='$pass', cpassword='$cpass' ";
        $con->query($upd);
        $suc = "Password Changed";
        header("location: ../../details.php");
    }else{
        $err = "Password do not match";
        header("location: ../../details.php");
    }

}else{
    echo "error";
}
?>