<?php
session_start();
include("admin/db/db.php");
if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  $data = "SELECT * FROM user WHERE email='$email'";
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
            <h2 class="text-3xl font-bold text-gray-600 my-12">Job Profile</h2>
          </div>
    
          <?php
          // Fetch job listings
          $id=$_GET['jid'];
          $sel = "SELECT recruiter.cname, recruiter.email, jobs.* 
                  FROM recruiter 
                  INNER JOIN jobs ON recruiter.cid = jobs.rid WHERE jid='$id'";  
          $rs = $con->query($sel);
          $row = $rs->fetch_assoc();
          ?>
          <!-- Job Button -->

          
          
          <div  class="text-start">
            <div class="grid grid-cols-1 gap-5 shadow-xl mt-5">
              <div class="h-full ring-1 ring-gray-400 p-6 rounded-xl flex flex-col gap-3">
                <div class="flex flex-col items-start">
                
                  <div class="flex justify-between w-full">
                    <h3 class="text-2xl text-blue-800 font-bold"><?php echo $row['role']; ?>, Exprience : <?php echo $row['exp']; ?></h3>
                  </div>
                  <p><?php echo $row['cname']; ?></p>
                  <p><?php echo $row['city']; ?>, <?php echo $row['state']; ?></p>
                  
                </div>
                <div class="flex items-start">
                  <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10"><?php echo $row['type']; ?></span>
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
                <div class="mini-description text-sm flex">
                  <p>Project Role : 
                    <?php
                    echo $row['about'];
                    ?>
                  </p>
                </div>

                <div>
                    <p><?php echo $row['country']; ?>, <?php echo $row['state']; ?></p>
                    <p><?php echo $row['city']; ?>, <?php echo $row['pin']; ?></p>
                </div>

                <div><p class="text-gray-400 text-sm">Posted 4 days ago</p></div>
                <div></div>
                <div class="text-end">
                  <?php if(isset($_SESSION['email'])){ ?>
                    <a href="profile.php?id=<?php echo $row['jid']; ?>" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear">Apply Now</a>
                  <?php } else { ?>
                    <button onclick="openModal('modelConfirm')" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear">Apply Now</button>
                  <?php } ?>
                </div>
              </div>
            </div>

            <!-- Model Box -->

          <div id="modelConfirm" class="fixed hidden top-0 z-50 inset-0 h-full w-full px-4">
                <div class="relative top-10 mx-auto shadow-2xl rounded-md border bg-white max-w-md">
                    <div class="flex justify-end p-2">
                        <button onclick="closeModal('modelConfirm')" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1 ml-auto inline-flex items-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="p-6 pt-0 flex flex-col">
                        <h2 class="text-2xl text-center font-bold mb-5 text-blue-900">Alert Message from Jobify</h2>
                        <!-- Content Area -->
                        <span class="text-start text-lg font-medium mb-3 text-red-700 p-2 rounded-lg">Warning : Login First to Access</span>
                        <div class="text-end">
                          <button onclick="closeModal('modelConfirm')" type="button" class="px-4 py-2 rounded-lg bg-red-700 text-white font-semibold hover:ring-1 hover:ring-red-900 hover:bg-white hover:text-red-900 duration-300 ease-linear">Close</button>
                        </div>
                    </div>
                </div>
            </div>
          </div>



          </div>
        </div>
    <?php //include("includes/footer.php"); ?>

    <script type="text/javascript" src="index.js"></script>
  </body>
</html>
