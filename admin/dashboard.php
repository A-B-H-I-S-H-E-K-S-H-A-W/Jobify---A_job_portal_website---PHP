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
        <h2 class="text-3xl text-gray-500 p-5">Welcome to jobify</h2>
        <div class="pl-10 grid grid-cols-1 md:grid-cols-2">
          
          <div>
            <?php if($row['verify'] == 'Not Verified'){ ?>
              <div class="p-10 border shadow-xl max-w-xl mt-10 rounded-xl">
                <div class="flex flex-col items-start">
                  <h3 class="text-2xl font-semibold">Verify Yourself First...</h3>
                  <a href="verify.php" class="mt-5 px-4 py-2 rounded-lg bg-blue-800 text-white font-semibold hover:ring-1 hover:ring-black-900 hover:bg-white hover:text-blue-700 duration-300 ease-linear">Verify</a>
                </div>
              </div>
            <?php } else if($row['verify'] == 'Verified') { ?>

              <div class="p-10 border shadow-xl max-w-xl mt-10 rounded-xl">
                <div class="flex flex-col items-start">
                  <h3 class="text-2xl font-semibold">You are Verified</h3>
                  <p>Now enter your company details to continue listing jobs.</p>
                  <a href="details.php" class="mt-5 px-4 py-2 rounded-lg bg-blue-800 text-white font-semibold hover:ring-1 hover:ring-black-900 hover:bg-white hover:text-blue-700 duration-300 ease-linear">Redirect to Company Details Form</a>
                </div>
              </div>
              
            <?php } else { ?>
              <div class="p-10 border shadow-xl max-w-xl mt-10 rounded-xl">
                <div class="flex flex-col items-start">
                  <h3 class="text-2xl font-semibold">Your Verification for the Company is Pending...</h3>
                </div>
              </div>
            <?php } ?>
          </div>

          <?php
            $count = 0;
              $sel = "SELECT  jobs.role, jobs.type, jobs.jcat, jobs.exp, user.* FROM jobs INNER JOIN user ON jobs.jid = user.conid";
              $rs = $con->query($sel);
              while($row = $rs->fetch_assoc()){ 
                $count += 1;
                ?>
            <div class="p-10 border shadow-xl max-w-xl mt-10 rounded-xl">
              <div class="flex flex-col items-start">
                <h3 class="text-2xl text-blue-900">Hey, you got <span class="font-bold"><?php echo $count; ?> notifications.</span></h3>
                <a href="notification.php" class="mt-5 px-4 py-2 rounded-lg bg-blue-800 text-white font-semibold hover:ring-1 hover:ring-black-900 hover:bg-white hover:text-blue-700 duration-300 ease-linear">Redirect to Notifications</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </body>
</html>
