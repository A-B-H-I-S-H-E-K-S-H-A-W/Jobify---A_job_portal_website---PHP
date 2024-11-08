<?php
session_start();
include("admin/db/db.php");
if(isset($_SESSION['email'])){
  $data = "SELECT * FROM user";
  $rs=$con->query($data);
  $row=$rs->fetch_assoc();
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
            <h2 class="text-3xl font-bold text-gray-600 my-16">All Available Companies</h2>
          </div>
    
          <?php
          // Fetch company listings
          $seli = "SELECT * FROM recruiter";
          $rsi = $con->query($seli);
          while ($row = $rsi->fetch_assoc()) {
          ?>
          <!-- Comapny Card -->
          <div  class="text-start">
            <div class="grid grid-cols-1 gap-5 shadow-xl mt-5">
              <div class="h-full ring-1 ring-gray-400 p-6 rounded-xl flex flex-col gap-3">
              <a href="perjob.php?jid=<?php echo $row['cid'] ?>">
                <div class="flex flex-col items-start">
                
                  <div class="flex justify-between w-full">
                    <h3 class="text-2xl text-blue-800 font-bold"><?php echo $row['cname']; ?></h3>
                    <p class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear">About Company</p>
                  </div>
                  <p><?php echo $row['city']; ?>, <?php echo $row['state']; ?></p>
                  <p>Total job openings : <?php
                  $count = 0; 
                  $cid = $row['cid'];
                  $sel = "SELECT * FROM jobs WHERE rid='$cid'";
                  $rs = $con->query($sel);
                  while ($row = $rs->fetch_assoc()) {
                    if($cid == $row['rid']){
                      $count += 1;
                    } 
                  }
                  echo $count;
                  ?></p>
                  
                </div>
                </a>
              </div>
            </div>
          </div>
          <?php } ?>
    </div>

    <?php include("includes/footer.php"); ?>
  </body>
</html>
