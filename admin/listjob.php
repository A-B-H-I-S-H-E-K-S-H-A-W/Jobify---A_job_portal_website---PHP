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
    <title>Job List</title>
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
          <h2 class="text-3xl text-gray-500">All Listed Jobs </h2>

          <div class="flex flex-col">

          <?php 
          $sel = "SELECT recruiter.cname, recruiter.email, jobs.* 
          FROM recruiter 
          INNER JOIN jobs ON recruiter.cid = jobs.rid";  
          $rs = $con->query($sel);
          while($row= $rs->fetch_assoc()){
          ?> 
          <button onclick="alert('hello')" class="text-start">
            <div class="grid grid-cols-1 gap-5 shadow-xl mt-5">
                <div class="h-full ring-1 ring-gray-400 p-6 rounded-xl flex flex-col gap-3 items-start">
                    <div class="flex flex-col items-start">
                        <h3 class="text-2xl text-blue-800 font-bold"><?php echo $row['role']; ?>, <?php echo $row['exp']; ?></h3>
                        <p><?php echo $row['cname']; ?></p>
                        <p><?php echo $row['city']; ?>, <?php echo $row['state']; ?></p>
                    </div>
                    <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10"><?php echo $row['type']; ?></span>

                    <div class="mini-description text-sm flex">
                      <p>Project Role : <?php if(strlen($row['about']) > 300){
                        $str = substr($row['about'], 0, 300);
                        echo $str. "...";
                      } else {
                        echo $row['about'];
                      } ?></p>
                    </div>
                    <div><p class="text-gray-700 text-sm">Salary: <?php if($row['min_salary'] == 0 && $row['max_salary'] == 0){
                      echo "Not disclosed";
                    } else {
                      echo "₹ ".$row['min_salary']. "- ₹ ". $row['max_salary'];
                    } ?></p></div>
                    

                    <div><p class="text-gray-400 text-sm">Posted 4 days ago</p></div>
                </div>
            </div>
          </button>
            

            <?php } ?>
          </div>
          
        </div>
      </div>
    </div>
  </body>
</html>
