<?php
session_start();
include("admin/db/db.php");
if(!isset($_SESSION['email_id'])){
  
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
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
    <?php include("includes/header.php"); ?>
    <div class="max-w-[1280px] mx-auto px-10">
          <div>
            <h2 class="text-3xl font-bold text-gray-600 my-16">All Available Jobs</h2>
          </div>
    
          <?php
          // Fetch job listings
          $sel = "SELECT recruiter.cname, recruiter.email, jobs.* 
                  FROM recruiter 
                  INNER JOIN jobs ON recruiter.cid = jobs.rid";  
          $rs = $con->query($sel);
          while ($row = $rs->fetch_assoc()) {
          ?>
          <!-- Job Button -->

          
          
          <div  class="text-start">
            <div class="grid grid-cols-1 gap-5 shadow-xl mt-5">
              <div class="h-full ring-1 ring-gray-400 p-6 rounded-xl flex flex-col gap-3">
              <a href="jobDetails.php?jid=<?php echo $row['jid'] ?>">
                <div class="flex flex-col items-start">
                
                  <div class="flex justify-between w-full">
                    <h3 class="text-2xl text-blue-800 font-bold"><?php echo $row['role']; ?>, Exprience : <?php echo $row['exp']; ?></h3>
                    <p class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear">Show Details</p>
                  </div>
                  <p><?php echo $row['cname']; ?></p>
                  <p><?php echo $row['city']; ?>, <?php echo $row['state']; ?></p>
                  
                </div>
                </a>
                <div class="flex items-start">
                  <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10"><?php echo $row['type']; ?></span>
                </div>
                <div class="mini-description text-sm flex">
                  <p>Project Role : 
                    <?php
                    if (strlen($row['about']) > 300) {
                      echo substr($row['about'], 0, 300) . "...";
                    } else {
                      echo $row['about'];
                    }
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
                </p></div>
                <div><p class="text-gray-400 text-sm">Posted 4 days ago</p></div>
              </div>
            </div>
          </div>
          <?php } ?>
    </div>

    <?php include("includes/footer.php"); ?>
  </body>
</html>
