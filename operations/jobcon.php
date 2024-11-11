<?php
include("../admin/db/db.php");

$uid = $_GET['id'];
$jid = $_GET['jid'];

$upd = "UPDATE user SET conid='$jid' WHERE uid='$uid' ";
$con->query($upd);

header("location:../jobDetails.php?jid=$jid");
?>