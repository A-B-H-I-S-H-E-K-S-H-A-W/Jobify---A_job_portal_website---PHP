<?php
include("../admin/db/db.php");
if(isset($_POST['profile-save'])){
    $profile = $_POST['profile'];
    $uid = $_POST['uid'];

    $sel = "SELECT * FROM user WHERE uid='$uid'";
    $rs= $con->query($sel);
    $row= $rs->fetch_assoc();

    unlink("../uploads/profile/".$row['profile']);

    $buf = $_FILES['profile']['tmp_name'];
    $profile = time() . $_FILES['profile']['name'];
    move_uploaded_file($buf, "../uploads/profile/" . $profile);

    $upd = "UPDATE user SET profile='$profile'";
    $con->query($upd);
    header("location:../settings.php");
} else {
    echo "error";
}

?>