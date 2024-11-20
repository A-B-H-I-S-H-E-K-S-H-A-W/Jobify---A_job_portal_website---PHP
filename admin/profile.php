<?php
session_start();
include("db/db.php");
if(!isset($_SESSION['email'])){
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <!-- Main wrapper to hold sidebar and main content -->
    <div class="flex">
      <!-- Sidebar -->
      <?php include("includes/sidebar.php"); ?>

      <!-- Main content (topbar and other content) -->
      <div class="flex-1 flex flex-col">
        <!-- Topbar -->
        <?php include("includes/topbar.php"); ?>

        <!-- Other content can go here -->
        <h2 class="text-3xl text-gray-500 p-10">Candidate Profile</h2>
        

        <div class="mb-10 max-w-[1280px] mx-auto">
        <div class="border shadow-2xl w-full p-10">
            <?php 
            $uid = $_GET['uid'];
            $sel = "SELECT user.*, jobs.* FROM user INNER JOIN jobs ON user.conid = jobs.jid WHERE uid='$uid'";
            $rs = $con->query($sel);
            $roww = $rs->fetch_assoc();
            ?>
            <div class="grid grid-cols-[30%_70%]">
                <div class="flex flex-col gap-5 border-r-2">
                    <div>
                        <img src="../uploads/profile/<?php echo $roww['profile'] ?>" class="w-40 border rounded-full" alt="Set up your iimage">
                    </div>
                      <h2 class="font-semibold text-3xl text-blue-800"><?php echo $roww['name']; ?></h2>
                    <div>
                    <h2 class="text-2xl text-semibold my-2">Contact :</h2>
                    <div>
                        <p><span class="font-semibold">Email :</span> <?php echo $roww['email_id']; ?></p>
                        <p><span class="font-semibold">Address : </span><?php echo $roww['street'] ?></p>
                        <p><span class="font-semibold">State : </span><?php echo $roww['state'] ?>, <?php echo $roww['city'] ?></p>
                        <p><span class="font-semibold">Pin-code : <?php echo $roww['pin'] ?></p>
                    </div>
                </div>
                </div>
                
                <div class="px-10 flex flex-col justify-between">
                  <div class="text-start">
                      <p class="text-gray-800 text-lg pb-4 border-b-2"><?php echo $roww['about']; ?></p>
                      <div>
                        <h3 class="mt-3 text-2xl underline text-blue-800">Applied Job Details</h3>
                        <div class="mt-3">
                          <p><span class="font-semibold ">Job Role : </span><?php echo $roww['role']; ?></p>
                          <p><span class="font-semibold ">Job Category : </span><?php echo $roww['jcat']; ?></p>
                          <p><span class="font-semibold ">Job Type : </span><?php echo $roww['type']; ?></p>
                          <p><span class="font-semibold ">Job Exprience : </span><?php echo $roww['exp']; ?></p>
                          <p><span class="font-semibold ">Salary : </span>₹ <?php echo $roww['min_salary']; ?> - ₹ <?php echo $roww['max_salary']; ?></p>
                          <p><span class="font-semibold ">State : </span><?php echo $roww['state']; ?>, <?php echo $roww['city']; ?></p>
                        </div>
                      </div>
                      <div class="text-center mt-5 flex justify-between items-center">
                          <h2 class="text-2xl text-semibold underline text-blue-800 mb-5">Download Candidate's CV</h2>
                          <a download href="uploads/cv/<?php echo $roww['cv']; ?>" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold mt-2 hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-300 ease-linear">Download</a>
                      </div>
                  </div>
                  <div class="flex justify-end">
                    <a href="" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold mt-2 hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-300 ease-linear">Send Interview Email</a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
