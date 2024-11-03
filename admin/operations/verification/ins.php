<?php
include("../../db/db.php");

if (isset($_POST['save'])) {
    $rname = $_POST['rname'];
    $email = $_POST['email'];
    $pan = $_POST['pan'];
    $gst = $_POST['gst'];
    $link = $_POST['website'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $verify = "Verification Pending...";

    $buf = $_FILES['docs']['tmp_name'];
    $type = $_FILES['docs']['type'];
    $pdf = time() . $_FILES['docs']['name'];
    move_uploaded_file($buf, "../../uploads/" . $pdf);

    $buf2 = $_FILES['license']['tmp_name'];
    $type2 = $_FILES['license']['type'];
    $pdf2 = time() . $_FILES['license']['name'];
    move_uploaded_file($buf2, "../../uploads/" . $pdf2);

    if ($type == "application/pdf" && $type2 == "application/pdf") {
        $ins = "INSERT INTO verify (rname, email, pan, gst, country, city, state, docs, license, verify, website) VALUES ('$rname', '$email', '$pan', '$gst', '$country', '$city', '$state', '$pdf', '$pdf2', '$verify', '$link')";
        $con->query($ins);
        

        $sel = "SELECT * FROM verify WHERE rname='$rname'";
        $rs=$con->query($sel);
        $row = $rs->fetch_assoc();

        $_SESSION['verify'] = $row['verify'];
        
        header("location:../../verify.php");
    } else {
        echo "Error 404";
    }
} else {
    echo "error";
}
?>
