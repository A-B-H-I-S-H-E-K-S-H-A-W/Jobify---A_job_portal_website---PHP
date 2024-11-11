<?php
include("../admin/db/db.php");

$uid = $_GET['id'];
$jid = $_GET['jid'];
$upd = "UPDATE user SET conid='$jid' WHERE uid='$uid'";
$rs = $con->query($sel);
$row = $rs->fetch_assoc();



?>