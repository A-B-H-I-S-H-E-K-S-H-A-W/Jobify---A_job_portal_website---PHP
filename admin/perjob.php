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
        <div class="p-10">
          <h2 class="text-3xl text-gray-500">Job Details</h2>

          <div class="flex flex-col">

          <?php
          $jid = $_GET['jid'];  // Get the job ID from the URL

            // Query the specific job based on jid
            $sel = "SELECT recruiter.cname, recruiter.email, jobs.* 
                    FROM recruiter 
                    INNER JOIN jobs ON recruiter.cid = jobs.rid 
                    WHERE jobs.jid = '$jid'";  // Filter by job ID here

            $rs = $con->query($sel);
            $row = $rs->fetch_assoc();  // Fetch the specific job data
            ?>
          <!-- Job Button -->
          
          <div  class="text-start">
            <div class="grid grid-cols-1 gap-5 shadow-xl mt-5">
              <div class="h-full ring-1 ring-gray-400 p-6 rounded-xl flex flex-col gap-3">
                <div class="flex flex-col items-start">
                
                  <div class="flex justify-between w-full">
                    <h3 class="text-2xl text-blue-800 font-bold"><?php echo $row['role']; ?></h3>
                    <a
                      href="edit.php?jid=<?php echo $row['jid']; ?>"
                      class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear"
                    >
                      Edit Details
                    </a>
                  </div>
                  <p><?php echo $row['cname']; ?></p>
                  <p><?php echo $row['city']; ?>, <?php echo $row['state']; ?></p>
                  
                </div>
                <div class="flex items-start">
                  <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10"><?php echo $row['type']; ?></span>
                </div>
                <div><p class="font-semibold text-blue-900">Job field : <span></span><?php echo $row['jcat'] ?></p></div>
                <div class="mini-description text-sm flex">
                  <p><span class="font-semibold">Project Role : </span>
                    <?php
                    echo $row['about'];
                    ?>
                  </p>
                </div>
                <div><p class="text-gray-700 text-sm">Salary: 
                  <?php
                  if ($row['min_salary'] == 0 && $row['max_salary'] == 0) {
                    echo "Not disclosed";
                  } else {
                    echo "₹ " . $row['min_salary'] . " - ₹ " . $row['max_salary'];
                  }
                  ?>

                  <p class="mt-3"><span class="font-semibold">Exprience Needed : </span><?php echo $row['exp']; ?></p>

                  <p class="mt-4"><span class="font-semibold">Contact : </span><?php echo $row['email']; ?></p>
                </p></div>
                <div><p class="text-gray-400 text-sm">Posted 4 days ago</p></div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>