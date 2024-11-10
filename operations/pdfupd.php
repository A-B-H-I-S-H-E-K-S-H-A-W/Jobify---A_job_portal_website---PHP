<?php
include("../admin/db/db.php"); 
if(isset($_POST['cv-save'])){
    $cv = $_POST['cv'];
    $uid = $_POST['uid'];

    $sel = "SELECT * FROM user WHERE uid='$uid' ";
    $rs= $con->query($sel);
    $row= $rs->fetch_assoc();

    unlink("../uploads/cv/".$row['cv']);

    $buf2 = $_FILES['pdf']['tmp_name'];
    $cv = time() . $_FILES['pdf']['name'];
    move_uploaded_file($buf2, "../uploads/cv/" . $cv);

    $upd2 = "UPDATE user SET cv='$cv'";
    $con->query($upd2);
    header("location:../settings.php");
} else {
    echo "error";
}

?>