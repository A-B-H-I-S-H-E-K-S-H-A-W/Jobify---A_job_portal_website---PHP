<?php
session_start();
ob_start(); // Start output buffering
include("../../db/db.php");

if(isset($_GET['submit'])){
    $email = $_GET['email'];
    $date = $_GET['date'];
    $time = $_GET['time'];
    $location = $_GET['location'];
    $duration = $_GET['duration'];
}


// echo $email;
// echo $date;
// echo $time;
// echo $location;
// echo $duration;

$sel = "SELECT jobs.*, recruiter.* FROM jobs INNER JOIN recruiter ON jobs.rid = recruiter.cid WHERE email='$email'";
$rs = $con->query($sel);
$row = $rs->fetch_assoc();

$cname = $row['cname'];
$role = $row['role'];
$state = $row['state'];
$city = $row['city'];
$pin = $row['pin'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $_SESSION['email'];                     // SMTP username
    $mail->Password   = 'dmll kxzj ixyj tcut';                  // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
    $mail->Port       = 465;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Recipients
    $mail->setFrom($_SESSION['email'], "$cname");
    $mail->addAddress($email, 'Jobify');                        // Add a recipient

    // Content
    $mail->isHTML(true);                                        // Set email format to HTML
    $mail->Subject = "Interview Invitation for job role - $role at $cname";
    $mail->Body    = "Dear Candidate, <br>
                    We are pleased to inform you that you have been selected for an interview for the position of $role at $cname. After reviewing your application and qualifications, we believe that you could be a great fit for our team. <br><br>
                    <b>Interview Details:</b> <br><br>
                    <b>Date:</b> $date<br>
                    <b>Time:</b> $time<br>
                    <b>Address:</b> $location
                    <b>State:</b> $state, $city - $pin <br>
                    Duration: Approximately $duration hours <br>
                    During the interview, you will have the opportunity to meet with members of our team and learn more about the role and our company. Please bring a copy of your resume, and be prepared to discuss your experience and qualifications in detail. <br>
                    If you have any questions or need to reschedule, please contact us at $email. We look forward to meeting you and discussing how you can contribute to the success of $cname. <br>
                    Thank you for your interest in joining our company. <br> <br>
                    Best regards, <br>
                    $cname <br>
                    $email";

    $mail->send();
    $sent = "success"; 

} catch (Exception $e) {
    $sent = "error";
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

if($sent == "success"){
    $msg = 'Email has been sent successfully';
    header("Location: ../../notification.php?msg=".$msg);
    exit();
} else {
    echo "errr";
}

ob_end_flush();
?>
