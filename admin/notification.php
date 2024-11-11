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
          <h2 class="text-3xl text-gray-500">All Job Applied Candidates</h2>

          <div class="mt-10">
            <ul role="list" class="divide-y divide-gray-100">
              <?php
              $sel = "SELECT  jobs.role, jobs.type, jobs.jcat, jobs.exp, user.* FROM jobs INNER JOIN user ON jobs.jid = user.conid";
              $rs = $con->query($sel);
              while($row = $rs->fetch_assoc()){ ?>
              <a href="profile.php?id=<?php echo $row['uid']; ?>">
                <li class="flex justify-between gap-x-6 p-5 border rounded-xl shadow-xl mb-5">
                  <h3 class="my-4 font-semibold text-lg">Job Applicant : </h3>
                    <div class="flex min-w-0 gap-x-4">
                    <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="../uploads/profile/<?php echo $row['profile'] ?>" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900"><?php echo $row['name'] ?></p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500"><?php echo $row['email_id'] ?></p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500"><?php echo $row['state'] ?>, <?php echo $row['city'] ?></p>
                    </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <a href="profile.php" class="px-4 py-1 rounded-lg ring-1 ring-black">
                        View Profile
                    </a>
                    </div>
                </li>
              </a>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
