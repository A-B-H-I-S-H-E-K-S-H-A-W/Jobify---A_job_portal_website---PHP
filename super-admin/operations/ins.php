<?php
include("../db/db.php");

$id=$_GET['id'];

$confirm = "Verified";
$upd = "UPDATE verify SET verify='$confirm' WHERE vid='$id'";
$con->query($upd);

$sel = "SELECT * FROM verify WHERE vid='$id'";
$rs= $con->query($sel);
$row=$rs->fetch_assoc();

header("location:../verified.php");
?>