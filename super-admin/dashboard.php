<?php
session_start();
include("db/db.php");
if(!isset($_SESSION['name'])){
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - jobify</title>
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
        <div class="p-10">
          <h2 class="text-3xl text-gray-500">Dashboard</h2>
          <div class="border py-10 px-10 mt-10 max-w-lg rounded-lg shadow-xl">
            <h2 class="text-2xl font-semibold mb-5">Notifications : </h2>
            <div class="flex flex-col">
              <?php
                $sel = "SELECT * FROM recruiter";
                $rs = $con->query($sel);
                $count=0;
                while($row = $rs->fetch_assoc()) {
                if($row['verify'] == 'Verification Pending'){
                 $count+=1;
                }
               } 
               ?>
              <div class="text-center">
                <span class="inline-flex items-center rounded-md bg-blue-50 px-4 py-2 font-medium text-blue-700 ring-1 ring-inset ring-blue-600/10">Notification : Remaining Verification <?php echo $count ?></span>
              </div>
              <div class="text-center mt-5">
                <a href="verification.php" class="text-center px-4 py-2 rounded-lg bg-black text-white font-semibold hover:ring-1 hover:ring-black-900 hover:bg-white hover:text-black duration-300 ease-linear">View Pending Verifications</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
