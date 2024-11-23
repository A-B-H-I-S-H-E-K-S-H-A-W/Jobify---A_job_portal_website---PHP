<?php
session_start();
include("db/db.php");
if(!isset($_SESSION['email'])){
  header("location: login.php");
}

if(isset($_GET['search'])){
  $cat = $_GET['jobcat'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Notifications</title>
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
          <h2 class="text-3xl text-gray-500">All Job Applied Candidates <?php 
                      if(isset($_GET['msg'])){
                        $msg = $_GET['msg'];
                    ?>
                      <span class="inline-flex text-lg items-center rounded-md bg-blue-50 px-4 py-2 font-medium text-blue-700 ring-1 ring-inset ring-blue-600/10"><?php if(isset($msg)){ echo $msg; }; ?></span>
                    <?php } ?></h2>

          <div class="mt-5 text-center flex flex-col gap-2 items-center ">
            <h2 class="text-2xl text-blue-900 font-semibold">Search Job Applicants by Category</h2>
            <form action="notification.php" action="GET">
                  <select id="jobcat" name="jobcat" autocomplete="jobcat" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:max-w-xs sm:text-sm sm:leading-6">
                    <option value="All">All</option>
                    <option value="Full Stack Developer">Full Stack Developer</option>
                    <option value="Front-End Developer">Front-End Developer</option>
                    <option value="Back-End Developer">Back-End Developer</option>
                    <option value="UI/UX Designer">UI/UX Designer</option>
                    <option value="Cloud Engineer">Cloud Engineer</option>
                    <option value="Application Developer">Application Developer</option>
                    <option value="Data Scientist">Data Scientist</option>
                    <option value="AI Developer">AI Developer</option>
                    <option value="Back-End Engineer">Back-End Engineer</option>
                    <option value="Full-Stack Engineer">Full-Stack Engineer</option>
                    <option value="Database Engineer">Database Engineer</option>
                    <option value="Data Entry">Data Entry</option>
                    <option value="Accountant">Accountant</option>
                    <option value="Computer Operator">Computer Operator</option>
                    <option value="Software Developer">Software Developer</option>
                    <option value="Data Analyist">Data Analyist</option>
                  </select>
              <input type="submit" name="search" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold mt-2 hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-300 ease-linear" value="search">
            </form>
          </div>

          <div class="mt-10">
            <ul role="list" class="divide-y divide-gray-100">
              <?php
              if(isset($cat) && $cat != "All"){
              $sel = "SELECT jobs.role, jobs.type, jobs.jcat, jobs.exp, user.* FROM jobs INNER JOIN user ON jobs.jid = user.conid WHERE jcat='$cat' ";
              $rs = $con->query($sel);
              while($row = $rs->fetch_assoc()){ ?>
              <a href="profile.php?uid=<?php echo $row['uid']; ?>">
                <li class="flex justify-between gap-x-6 p-5 border rounded-xl shadow-xl mb-5">
                  <h3 class="my-4 font-semibold text-lg">Job Applicant :</h3>
                    <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="../uploads/profile/<?php echo $row['profile'] ?>" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900"><?php echo $row['name'] ?></p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500"><?php echo $row['email_id'] ?></p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500"><?php echo $row['state'] ?>, <?php echo $row['city'] ?></p>
                    </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <a href="profile.php?uid=<?php echo $row['uid']; ?>" class="px-4 py-1 rounded-lg ring-1 ring-black">
                        View Profile
                    </a>
                    </div>
                </li>
              </a>
              <?php } ?>
              <?php } ?>
            </ul>
          </div>
          <div class="mt-10">
            <ul role="list" class="divide-y divide-gray-100">
              <?php
              if($cat == "All"){
              $sel = "SELECT jobs.role, jobs.type, jobs.jcat, jobs.exp, user.* FROM jobs INNER JOIN user ON jobs.jid = user.conid";
              $rs = $con->query($sel);
              while($row = $rs->fetch_assoc()){ ?>
              <a href="profile.php?uid=<?php echo $row['uid']; ?>">
                <li class="flex justify-between gap-x-6 p-5 border rounded-xl shadow-xl mb-5">
                  <h3 class="my-4 font-semibold text-lg">Job Applicant :</h3>
                    <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="../uploads/profile/<?php echo $row['profile'] ?>" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900"><?php echo $row['name'] ?></p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500"><?php echo $row['email_id'] ?></p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500"><?php echo $row['state'] ?>, <?php echo $row['city'] ?></p>
                    </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <a href="profile.php?uid=<?php echo $row['uid']; ?>" class="px-4 py-1 rounded-lg ring-1 ring-black">
                        View Profile
                    </a>
                    </div>
                </li>
              </a>
              <?php } ?>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
