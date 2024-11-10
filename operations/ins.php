<?php 
include("../admin/db/db.php");
if (isset($_POST['save'])) {
    $uid = $_POST['uid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $about = $_POST['about'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $notification = $_POST['notification'];

    if(isset($_FILES['profile']['tmp_name']) && $_FILES['profile']['tmp_name'] != "" && isset($_FILES['pdf']['tmp_name']) && $_FILES['pdf']['tmp_name'] != ""){
        $buf = $_FILES['profile']['tmp_name'];
        $profile = time() . $_FILES['profile']['name'];
        move_uploaded_file($buf, "../uploads/profile/" . $profile);

        $buf2 = $_FILES['pdf']['tmp_name'];
        $pdf = time() . $_FILES['pdf']['name'];
        move_uploaded_file($buf2, "../uploads/cv/" . $pdf);

        $upd = "UPDATE user SET name='$name', email_id='$email', city='$city', state='$state', cv='$pdf', profile='$profile', notification='$notification', street='$street', pin='$pin', about='$about' WHERE uid='$uid' ";
        $con->query($upd);

    } else {
        $upd = "UPDATE user SET name='$name', email_id='$email', city='$city', state='$state', about='$about', notification='$notification', street='$street', pin='$pin' WHERE uid='$uid'";
        $con->query($upd);
    }
    header("location:../settings.php");
            
} else {
    echo "Error 404";
}
?>