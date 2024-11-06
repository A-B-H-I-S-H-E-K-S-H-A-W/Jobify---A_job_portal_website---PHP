<?php
include("../db/db.php");

$id=$_GET['id'];

$confirm = "Verified";
$upd = "UPDATE recruiter SET verify='$confirm' WHERE cid='$id'";
$con->query($upd);

header("location:../verified.php");
?>