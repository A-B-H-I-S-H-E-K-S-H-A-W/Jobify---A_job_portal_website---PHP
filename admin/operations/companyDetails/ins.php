<?php 
include("../../db/db.php");
if(isset($_POST['save'])){
    $cname = $_POST['companyname'];
    $email = $_POST['email'];
    $pan = $_POST['pan'];
    $gst = $_POST['gst'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $about = $_POST['about'];
    $id = $_POST['id'];

    $upd = "UPDATE recruiter SET cname='$cname', email='$email', pan='$pan', gst='$gst', country='$country', address='$address', city='$city', state='$state', pincode='$pin', about='$about', cid='$id' ";
    $con->query($upd);
    header("location: ../../listjob.php");
}else{
    echo "error";
}
?>