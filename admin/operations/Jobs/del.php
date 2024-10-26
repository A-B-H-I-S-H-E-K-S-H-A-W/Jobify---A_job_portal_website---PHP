<?php
include("../../db/db.php");
$jid = $_GET['jid'];
$del = "DELETE FROM jobs WHERE jid='$jid'";
$con->query($del);

header("../../listjob.php");
?>