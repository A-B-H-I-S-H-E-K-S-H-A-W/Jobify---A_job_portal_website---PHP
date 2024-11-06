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
          <h2 class="text-3xl text-gray-500">Company Details</h2>
                <?php 
                    $deny='Cancelled';
                    $sel="SELECT * FROM recruiter WHERE verify='$deny'";
                    $rs=$con->query($sel);
                    while($row=$rs->fetch_assoc()){
                ?>

          <div class="grid grid-cols-1 gap-5 shadow-xl mt-5">
            <div class=" h-full ring-1 ring-gray-400 p-6 rounded-xl grid grid-cols-3 gap-3">
                

                <div>
                    <div class="flex items-center mb-10 gap-3">
                        <h2 class="text-xl font-semibold ">Company Name : <?php echo $row['cname'] ?></h2>
                        <span class="inline-flex items-center rounded-md bg-red-50 px-4 py-2 font-medium text-red-700 ring-1 ring-inset ring-red-600/10"><?php echo $row['verify'] ?></span>
                    </div>
                    <div class="flex flex-col gap-3">
                        <p class="font-semibold">Email : <?php echo $row['email'] ?></p>
                        <p class="font-semibold">Website : <?php echo $row['website'] ?></p>
                        <p class="font-semibold">PAN No. : <?php echo $row['pan'] ?></p>
                        <p class="font-semibold">GST No. : <?php echo $row['gst'] ?></p>
                    </div>
                </div>
                <div class="flex flex-col gap-5 p-10 mt-10">
                    <p class="font-semibold">Country : <span><?php echo $row['country'] ?></span></p>
                    <p class="font-semibold">State : <?php echo $row['state'] ?></p>
                    <p class="font-semibold">City : <?php echo $row['city'] ?></p>
                </div>
                <div class="flex flex-col gap-5 p-10">
                    <h4 class="font-semibold">Comapny Documents</h4>
                    <a href="../admin/uploads/<?php echo $row['docs'] ?>" class="text-center px-4 py-2 rounded-lg bg-black text-white font-semibold hover:ring-1 hover:ring-black-900 hover:bg-white hover:text-black duration-300 ease-linear">View Documents</a>
                    <h4 class="font-semibold">Comapny License</h4>
                    <a href="../admin/uploads/<?php echo $row['license'] ?>" class="text-center px-4 py-2 rounded-lg bg-black text-white font-semibold hover:ring-1 hover:ring-black-900 hover:bg-white hover:text-black duration-300 ease-linear">View License</a>
                </div>
                <div></div>
                <div></div>
                <div class="border-t py-5 w-full flex justify-end">
                    <a href="operations/ins.php?id=<?php echo $row['cid']; ?>" class="px-4 py-2 rounded-lg bg-black text-white font-semibold hover:ring-1 hover:ring-black hover:bg-white hover:text-black duration-300 ease-linear">Re-approve</a>
                </div>
            </div>
          </div>

          <?php } ?>
        </div>
      </div>
    </div>
  </body>
</html>
