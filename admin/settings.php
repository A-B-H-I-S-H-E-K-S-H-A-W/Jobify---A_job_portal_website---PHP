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
          <h2 class="text-3xl text-gray-500">Settings</h2>
          <div class="mt-10">
            <ul role="list" class="divide-y divide-gray-100">
                <a href="verify.php">
                    <li class="flex justify-between gap-x-6 py-5 p-5 ring-1 rounded-lg hover:scale-105 hover:bg-blue-200 duration-200">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Verify your company <i class="fa-solid fa-check"></i></p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Send your company verifcation to jobify</p>
                            </div>
                        </div>
                    </li>
                </a>
                <?php 
                  $id = isset($_SESSION['id']);
                  $sel = "SELECT * FROM verify WHERE vid='$id'";
                  $rs=$con->query($sel);
                  $row=$rs->fetch_assoc();
                ?>

                <?php if(isset($row['verify']) == 'Verified'){ ?>
                <a href="details.php">
                    <li class="flex justify-between gap-x-6 py-5 p-5 ring-1 mt-5 rounded-lg hover:scale-105 hover:bg-blue-200 duration-200">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Edit company details <i class="fa-solid fa-check"></i></p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Edit your company details</p>
                            </div>
                        </div>
                    </li>
                </a>
                <?php } ?>

                <a href="logout.php">
                    <li class="flex justify-between gap-x-6 py-5 p-5 ring-1 mt-5 rounded-lg hover:scale-105 hover:bg-blue-200 duration-200">
                        <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-sm font-semibold leading-6 text-gray-900">Logout <i class="fa-solid fa-check"></i></p>
                                <p class="mt-1 truncate text-xs leading-5 text-gray-500">Logout Session</p>
                            </div>
                        </div>
                    </li>
                </a>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
