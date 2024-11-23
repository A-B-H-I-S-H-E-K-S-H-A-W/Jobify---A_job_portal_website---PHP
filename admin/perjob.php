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
                    <div class="flex gap-3">
                      
                    <a
                      href="edit.php?jid=<?php echo $row['jid']; ?>"
                      class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear"
                    >
                      Edit Details
                    </a>
                    <a href="operations/jobs/del.php?jid=<?php echo $row['jid']; ?>" onclick="return confirm('Are you sure to delete this record ?')" class="px-4 py-2 rounded-lg bg-red-700 text-white font-semibold hover:ring-1 hover:ring-red-900 hover:bg-white hover:text-red-900 duration-200 ease-linear" >Delete</a>


                    <?php if($row['valid'] == "valid"){ ?>
                    <button  onclick="openModal('modelConfirm')" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-200 ease-linear">End Job Posting</button>  
                      <?php } ?>

                      <?php if($row['valid'] == "end"){ ?>
                        <a href="operations/jobs/valid.php?jid=<?php echo $row['jid']; ?>" class="px-4 py-2 rounded-lg bg-green-700 text-white font-semibold hover:ring-1 hover:ring-green-900 hover:bg-white hover:text-green-900 duration-200 ease-linear">Repost Job</a>  
                      <?php } ?>
                  </div>
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




      <div id="modelConfirm" class="fixed hidden top-0 z-50 inset-0 h-full w-full px-4 ">
                <div class="relative top-28 mx-auto shadow-2xl rounded-md bg-white max-w-md">
                    <div class="flex justify-end p-2">
                        <button onclick="closeModal('modelConfirm')" type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="p-6 pt-0 text-start">
                        <h2 class="text-xl text-center font-semibold mb-4">Message</h2>
                        <p class="text-lg pt-5 mb-5 border-t">Are you sure to end the job posting?</p>
                        <div class="mt-5 border-t pt-5 flex justify-end">
                        <button type="button" onclick="closeModal('modelConfirm')"
                                class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                data-modal-toggle="delete-user-modal">
                                Cancel
                            </button>
                            <a href="operations/jobs/end.php?jid=<?php echo $row['jid']; ?>" name="submit"
                                class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                Sure
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <script type="text/javascript">
    window.openModal = function(modalId) {
        document.getElementById(modalId).style.display = 'block'
        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
    }

    window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    // Close all modals when press ESC
    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode === 27) {
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
            let modals = document.getElementsByClassName('modal');
            Array.prototype.slice.call(modals).forEach(i => {
                i.style.display = 'none'
            })
        }
    };
</script>
  </body>
</html>
