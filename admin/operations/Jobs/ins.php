<?php
include("../../db/db.php");
if(isset($_POST['save'])){
    $jobrole=$_POST['jobrole'];
    $jobtype=$_POST['jobtype'];
    $jobcat=$_POST['jobcat'];
    $exprience=$_POST['exprience'];
    $min=$_POST['min'];
    $max=$_POST['max'];
    $about=$_POST['about'];
    $country=$_POST['country'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $pin=$_POST['pin'];

    $ins="INSERT INTO jobs SET role='$jobrole', type='$jobtype', jcat='$jobcat', exp='$exprience', min_salary='$min', max_salary='$max', about='$about', country='$country', city='$city', state='$state', pin='$pin' ";
    $con->query($ins);
    header("location:../../listjob.php");
}else {
    echo "error";
}

?>