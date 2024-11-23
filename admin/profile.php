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
        <div class="flex gap-5">
          <h2 class="text-3xl text-gray-500 p-10">Candidate Profile</h2>
        </div>
        

        <div class="mb-10 max-w-[1280px] mx-auto">
        <div class="border shadow-2xl w-full p-10">
            <?php 
            $uid = $_GET['uid'];
            $sel = "SELECT user.*, jobs.* FROM user INNER JOIN jobs ON user.conid = jobs.jid WHERE uid='$uid'";
            $rs = $con->query($sel);
            $roww = $rs->fetch_assoc();
            ?>
            <div class="grid grid-cols-[30%_70%]">
                <div class="flex flex-col gap-5 border-r-2">
                    <div>
                        <img src="../uploads/profile/<?php echo $roww['profile'] ?>" class="w-40 border rounded-full" alt="Set up your iimage">
                    </div>
                      <h2 class="font-semibold text-3xl text-blue-800"><?php echo $roww['name']; ?></h2>
                    <div>
                    <h2 class="text-2xl text-semibold my-2">Contact :</h2>
                    <div>
                        <p><span class="font-semibold">Email :</span> <?php echo $roww['email_id']; ?></p>
                        <p><span class="font-semibold">Address : </span><?php echo $roww['street'] ?></p>
                        <p><span class="font-semibold">State : </span><?php echo $roww['state'] ?>, <?php echo $roww['city'] ?></p>
                        <p><span class="font-semibold">Pin-code : <?php echo $roww['pin'] ?></p>
                    </div>
                </div>
                </div>
                
                <div class="px-10 flex flex-col justify-between">
                  <div class="text-start">
                      <p class="text-gray-800 text-lg pb-4 border-b-2"><?php echo $roww['about']; ?></p>
                      <div>
                        <h3 class="mt-3 text-2xl underline text-blue-800">Applied Job Details</h3>
                        <div class="mt-3">
                          <p><span class="font-semibold ">Job Role : </span><?php echo $roww['role']; ?></p>
                          <p><span class="font-semibold ">Job Category : </span><?php echo $roww['jcat']; ?></p>
                          <p><span class="font-semibold ">Job Type : </span><?php echo $roww['type']; ?></p>
                          <p><span class="font-semibold ">Job Exprience : </span><?php echo $roww['exp']; ?></p>
                          <p><span class="font-semibold ">Salary : </span>₹ <?php echo $roww['min_salary']; ?> - ₹ <?php echo $roww['max_salary']; ?></p>
                          <p><span class="font-semibold ">State : </span><?php echo $roww['state']; ?>, <?php echo $roww['city']; ?></p>
                        </div>
                      </div>
                      <div class="text-center mt-5 flex justify-between items-center">
                          <h2 class="text-2xl text-semibold underline text-blue-800 mb-5">Download Candidate's CV</h2>
                          <a download href="uploads/cv/<?php echo $roww['cv']; ?>" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold mt-2 hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-300 ease-linear">Download</a>
                      </div>
                  </div>
                  <div class="flex justify-end">
                  <!-- href="operations/jobs/email.php?eid=<?php // echo $email; ?>" -->
                    <?php $email = $_SESSION['email']; ?>
                    <button onclick="openModal('modelConfirm')" class="px-4 py-2 rounded-lg bg-blue-900 text-white font-semibold mt-2 hover:ring-1 hover:ring-blue-900 hover:bg-white hover:text-blue-900 duration-300 ease-linear">Send Interview Email</button>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div id="modelConfirm" class="fixed hidden top-0 z-50 inset-0 h-full w-full px-4 ">
                <div class="relative top-40 mx-auto shadow-2xl rounded-md bg-white max-w-md">
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

                    <div class="p-6 pt-0 text-center">
                        <h2 class="text-xl font-demibold mb-4">Enter Interview Information</h2>
                        <form action="operations/jobs/email.php" method="GET">
                          <input type="hidden" name="email" value="<?php echo $email; ?>">
                            <div>
                                <div class="flex items-center justify-between">
                                    <label for="date" class="block text-sm font-medium leading-6 text-gray-900" en-us>Date</label>
                                </div>
                                <div class="mt-2">
                                    <input id="date" value="" name="date" type="date" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>

                            <div class="my-5">
                                <div class="flex items-center justify-between">
                                    <label for="time" class="block text-sm font-medium leading-6 text-gray-900">Time</label>
                                </div>
                                <div class="mt-2">
                                    <input id="time" value="" name="time" type="time" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="my-5">
                                <div class="flex items-center justify-between">
                                    <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Enter Only Address <span class="text-sm text-red-700">(Except city & pincode)</span></label>
                                </div>
                                <div class="mt-2">
                                    <input id="location" value="" name="location" type="text" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <div class="my-5">
                                <div class="flex items-center justify-between">
                                    <label for="duration" class="block text-sm font-medium leading-6 text-gray-900">Interview Duration <span class="text-sm text-blue-900">(In hours)</span></label>
                                </div>
                                <div class="mt-2">
                                    <input id="duration" value="" name="duration" type="text" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <button type="button" onclick="closeModal('modelConfirm')"
                                class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
                                data-modal-toggle="delete-user-modal">
                                Cancel
                            </button>
                            <button type="submit" name="submit"
                                class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                                Submit
                            </button>
                        </form>
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
