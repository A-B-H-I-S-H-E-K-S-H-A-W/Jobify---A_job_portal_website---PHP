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
    <title>Verification - jobify</title>
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
          <h2 class="text-3xl text-gray-500">Verification</h2>

          <div class="mt-10">
            <ul role="list" class="divide-y divide-gray-100">

              <?php 
                $verify = 'Verification pending';
                $sel= "SELECT * FROM recruiter WHERE verify='$verify'";
                $rs=$con->query($sel);
                while($row= $rs->fetch_assoc()){
              ?>
              <li class="flex justify-between gap-x-6 p-5 hover:bg-gray-200 rounded-xl cursor-pointer border mb-5 shadow-lg">
                  <div class="flex min-w-0 gap-x-4 ">
                  <div class="min-w-0 flex-auto">
                      <p class="text-xl font-semibold leading-6 text-gray-900"><Span class="font-bold">Company : </Span><?php echo $row['cname']; ?></p>
                      <p class="mt-1 truncate text-sm leading-5 text-gray-500"><span>Email : </span><?php echo $row['email'] ?></p>
                      <p class="mt-1 truncate text-sm leading-5 text-gray-500"><span>Pan No. : </span><?php echo $row['pan'] ?></p>
                      <p class="mt-1 truncate text-sm leading-5 text-gray-500"><span>GST No. : </span><?php echo $row['gst'] ?></p>
                      <p class="mt-1 truncate text-sm leading-5 text-gray-500"><span>Website Link : </span><?php echo $row['website'] ?></p>
                  </div>
                  </div>
                  <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                  <a href="details.php?id=<?php echo $row['cid'] ?>" class="px-4 py-1 rounded-lg ring-1 ring-black">
                      View Comapny Details
                  </a>
                  </div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
