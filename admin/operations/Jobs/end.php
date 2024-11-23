<?php
include("../../db/db.php");
$jid = $_GET['jid'];
$valid = "end";

$upd = "UPDATE jobs SET valid='$valid' WHERE jid='$jid'";
$con->query($upd);
header("location:../../listjob.php");
?>